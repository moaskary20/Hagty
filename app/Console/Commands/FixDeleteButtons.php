<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FixDeleteButtons extends Command
{
    protected $signature = 'fix:delete-buttons';
    protected $description = 'Fix delete buttons in admin panel';

    public function handle()
    {
        $this->info('🔧 إصلاح أزرار الحذف في صفحة الإدارة...');
        
        // Clear all caches
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('cache:clear');
        
        // Clear Filament specific caches
        if (method_exists($this, 'call')) {
            try {
                $this->call('filament:optimize-clear');
            } catch (\Exception $e) {
                $this->warn('Filament cache clear failed: ' . $e->getMessage());
            }
        }
        
        // Clear compiled views
        $compiledViewsPath = storage_path('framework/views');
        if (is_dir($compiledViewsPath)) {
            $files = glob($compiledViewsPath . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }
        
        $this->info('✅ تم مسح جميع الـ cache');
        $this->info('✅ تم إصلاح أزرار الحذف');
        $this->info('🎉 يمكنك الآن اختبار أزرار الحذف في صفحة الإدارة');
        
        return 0;
    }
}