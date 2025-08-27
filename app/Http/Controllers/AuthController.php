<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * عرض صفحة تسجيل الدخول
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * معالجة تسجيل الدخول
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'))
                ->with('success', 'تم تسجيل الدخول بنجاح! مرحباً بك في منصة HAGTY');
        }

        return redirect()->back()
            ->withErrors(['email' => 'بيانات الدخول غير صحيحة'])
            ->withInput($request->except('password'));
    }

    /**
     * عرض صفحة التسجيل
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * معالجة التسجيل
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date|before:today',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ], [
            'first_name.required' => 'الاسم الأول مطلوب',
            'last_name.required' => 'الاسم الأخير مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'phone.required' => 'رقم الهاتف مطلوب',
            'birth_date.required' => 'تاريخ الميلاد مطلوب',
            'birth_date.before' => 'تاريخ الميلاد يجب أن يكون في الماضي',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            'terms.required' => 'يجب الموافقة على الشروط والأحكام',
            'terms.accepted' => 'يجب الموافقة على الشروط والأحكام',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirmation']));
        }

        try {
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('home')
                ->with('success', 'تم إنشاء حسابك بنجاح! مرحباً بك في منصة HAGTY');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى'])
                ->withInput($request->except(['password', 'password_confirmation']));
        }
    }

    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'تم تسجيل الخروج بنجاح');
    }

    /**
     * عرض صفحة الملف الشخصي
     */
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    /**
     * تحديث الملف الشخصي
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date|before:today',
        ], [
            'first_name.required' => 'الاسم الأول مطلوب',
            'last_name.required' => 'الاسم الأخير مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'phone.required' => 'رقم الهاتف مطلوب',
            'birth_date.required' => 'تاريخ الميلاد مطلوب',
            'birth_date.before' => 'تاريخ الميلاد يجب أن يكون في الماضي',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user->update([
                'name' => $request->first_name . ' ' . $request->last_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
            ]);

            return redirect()->back()
                ->with('success', 'تم تحديث الملف الشخصي بنجاح');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'حدث خطأ أثناء تحديث الملف الشخصي'])
                ->withInput();
        }
    }

    /**
     * تغيير كلمة المرور
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'كلمة المرور الحالية مطلوبة',
            'new_password.required' => 'كلمة المرور الجديدة مطلوبة',
            'new_password.min' => 'كلمة المرور الجديدة يجب أن تكون 8 أحرف على الأقل',
            'new_password.confirmed' => 'تأكيد كلمة المرور الجديدة غير متطابق',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
        }

        try {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->back()
                ->with('success', 'تم تغيير كلمة المرور بنجاح');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'حدث خطأ أثناء تغيير كلمة المرور']);
        }
    }
}
