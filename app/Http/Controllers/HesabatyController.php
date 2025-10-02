<?php
namespace App\Http\Controllers;
use App\Models\Income;
use App\Models\Expense;
use App\Models\SavingsGoal;
use App\Models\BillReminder;
use App\Models\HesabatyBanner;
use App\Models\HesabatyVideo;
use Carbon\Carbon;

class HesabatyController extends Controller {
    public function index() {
        $userId = auth()->id();
        
        $totalIncome = Income::where('user_id', $userId)->sum('amount');
        $totalExpenses = Expense::where('user_id', $userId)->sum('amount');
        $balance = $totalIncome - $totalExpenses;
        
        $recentExpenses = Expense::where('user_id', $userId)->orderBy('expense_date', 'desc')->take(10)->get();
        $savingsGoals = SavingsGoal::where('user_id', $userId)->where('is_completed', false)->get();
        $upcomingBills = BillReminder::where('user_id', $userId)->where('is_paid', false)->where('due_date', '>=', now())->orderBy('due_date')->get();
        
        $banners = HesabatyBanner::where('is_active', true)->orderBy('display_order')->get();
        $videos = HesabatyVideo::where('is_active', true)->orderBy('display_order')->get();
        
        $expensesByCategory = Expense::where('user_id', $userId)->selectRaw('category, SUM(amount) as total')->groupBy('category')->get();
        
        return view('hesabaty.index', compact('totalIncome', 'totalExpenses', 'balance', 'recentExpenses', 'savingsGoals', 'upcomingBills', 'banners', 'videos', 'expensesByCategory'));
    }
    
    public function storeIncome(\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'income_date' => 'required|date',
            'is_recurring' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);
        
        $validated['user_id'] = auth()->id();
        $validated['is_recurring'] = $request->has('is_recurring');
        
        Income::create($validated);
        
        return redirect()->route('hesabaty.index')->with('success', 'تم إضافة الدخل بنجاح!');
    }
    
    public function storeExpense(\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'payment_method' => 'nullable|string|max:255',
            'expense_date' => 'required|date',
        ]);
        
        $validated['user_id'] = auth()->id();
        
        Expense::create($validated);
        
        return redirect()->route('hesabaty.index')->with('success', 'تم إضافة المصروف بنجاح!');
    }
    
    public function storeGoal(\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'goal_name' => 'required|string|max:255',
            'target_amount' => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'deadline' => 'nullable|date',
        ]);
        
        $validated['user_id'] = auth()->id();
        $validated['current_amount'] = $validated['current_amount'] ?? 0;
        $validated['is_completed'] = false;
        
        SavingsGoal::create($validated);
        
        return redirect()->route('hesabaty.index')->with('success', 'تم إضافة هدف الادخار بنجاح!');
    }
    
    public function storeBill(\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'bill_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'due_date' => 'required|date',
            'is_recurring' => 'nullable|boolean',
        ]);
        
        $validated['user_id'] = auth()->id();
        $validated['is_recurring'] = $request->has('is_recurring');
        $validated['is_paid'] = false;
        
        BillReminder::create($validated);
        
        return redirect()->route('hesabaty.index')->with('success', 'تم إضافة تذكير الفاتورة بنجاح!');
    }
}
