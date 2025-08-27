<?php
/**
 * ملف التحقق من رفع جميع ملفات المشروع
 * يتحقق من أن جميع الملفات مرفوعة ومتساوية مع الـ local repository
 */

echo "🔍 بدء التحقق من رفع جميع ملفات المشروع...\n\n";

// التحقق من وجود Git
if (!is_dir('.git')) {
    echo "❌ خطأ: هذا المجلد ليس Git repository\n";
    exit(1);
}

// التحقق من حالة Git
echo "📊 حالة Git:\n";
$gitStatus = shell_exec('git status --porcelain 2>&1');
if (empty(trim($gitStatus))) {
    echo "✅ Working tree نظيف - لا توجد ملفات معدلة أو جديدة\n";
} else {
    echo "⚠️  يوجد ملفات معدلة أو جديدة:\n";
    echo $gitStatus;
}

echo "\n";

// التحقق من آخر commit
echo "📝 آخر commit:\n";
$lastCommit = shell_exec('git log --oneline -1 2>&1');
if ($lastCommit) {
    echo "✅ " . trim($lastCommit);
} else {
    echo "❌ لا يمكن الحصول على آخر commit";
}

echo "\n\n";

// التحقق من حالة الـ remote
echo "🌐 حالة الـ Remote Repository:\n";
$remoteStatus = shell_exec('git remote show origin 2>&1');
if (strpos($remoteStatus, 'up to date') !== false) {
    echo "✅ الـ local repository محدث مع الـ remote\n";
} else {
    echo "⚠️  الـ local repository غير محدث مع الـ remote\n";
}

echo "\n";

// التحقق من عدد الملفات في آخر commit
echo "📁 تفاصيل آخر commit:\n";
$commitHash = trim(shell_exec('git log --oneline -1 --format="%H" 2>&1'));
if ($commitHash) {
    $filesInCommit = shell_exec("git show --name-only $commitHash 2>&1");
    $fileCount = count(array_filter(explode("\n", $filesInCommit)));
    echo "✅ عدد الملفات في آخر commit: $fileCount\n";
    
    // عرض الملفات المهمة
    $importantFiles = shell_exec("git show --name-only $commitHash 2>&1 | grep -E '(home|register|slider|3d|footer|header)' | wc -l");
    $importantFiles = trim($importantFiles);
    echo "✅ عدد الملفات المهمة: $importantFiles\n";
    
    // عرض الملفات المهمة
    echo "\n📋 الملفات المهمة:\n";
    $importantFilesList = shell_exec("git show --name-only $commitHash 2>&1 | grep -E '(home|register|slider|3d|footer|header)'");
    if ($importantFilesList) {
        $files = array_filter(explode("\n", $importantFilesList));
        foreach ($files as $index => $file) {
            if (!empty(trim($file))) {
                echo "   " . ($index + 1) . ". " . trim($file) . "\n";
            }
        }
    }
} else {
    echo "❌ لا يمكن الحصول على تفاصيل آخر commit";
}

echo "\n";

// التحقق من أن الـ working directory نظيف
echo "🧹 التحقق من الـ Working Directory:\n";
$workingTreeClean = empty(trim(shell_exec('git status --porcelain 2>&1')));
$upToDate = strpos($remoteStatus, 'up to date') !== false;

if ($workingTreeClean && $upToDate) {
    echo "✅ جميع الملفات مرفوعة ومتساوية مع الـ remote repository\n";
    echo "✅ المشروع جاهز للنشر\n";
} else {
    echo "⚠️  يوجد مشاكل في رفع الملفات:\n";
    if (!$workingTreeClean) {
        echo "   - Working directory غير نظيف\n";
    }
    if (!$upToDate) {
        echo "   - Local repository غير محدث مع الـ remote\n";
    }
}

echo "\n";

// التحقق من الـ branch الحالي
echo "🌿 الـ Branch الحالي:\n";
$currentBranch = shell_exec('git branch --show-current 2>&1');
if ($currentBranch) {
    echo "✅ الـ branch الحالي: " . trim($currentBranch);
} else {
    echo "❌ لا يمكن تحديد الـ branch الحالي";
}

echo "\n\n";

// التحقق من الـ remote URL
echo "🔗 Remote URL:\n";
$remoteUrl = shell_exec('git remote get-url origin 2>&1');
if ($remoteUrl) {
    echo "✅ Remote URL: " . trim($remoteUrl);
} else {
    echo "❌ لا يمكن الحصول على Remote URL";
}

echo "\n\n";

// ملخص نهائي
echo "📋 ملخص التحقق:\n";
echo "================\n";

$allGood = $workingTreeClean && $upToDate && !empty($commitHash);

if ($allGood) {
    echo "🎉 تم التحقق بنجاح! جميع الملفات مرفوعة ومتساوية\n";
    echo "✅ Working tree نظيف\n";
    echo "✅ Local repository محدث مع الـ remote\n";
    echo "✅ آخر commit موجود: $commitHash\n";
    echo "✅ المشروع جاهز للنشر على السيرفر\n";
} else {
    echo "⚠️  يوجد مشاكل تحتاج إلى حل:\n";
    if (!$workingTreeClean) {
        echo "   - قم بحفظ التغييرات: git add . && git commit -m 'message'\n";
    }
    if (!$upToDate) {
        echo "   - قم برفع التغييرات: git push origin main\n";
    }
    if (empty($commitHash)) {
        echo "   - قم بإنشاء commit جديد\n";
    }
}

echo "\n";

// التحقق من وجود ملفات مهمة
echo "🔍 التحقق من الملفات المهمة:\n";
$importantFiles = [
    'resources/views/home.blade.php',
    'resources/views/auth/register.blade.php',
    'resources/views/components/shared-footer.blade.php',
    'public/css/home-enhancements.css'
];

foreach ($importantFiles as $file) {
    if (file_exists($file)) {
        echo "✅ $file موجود\n";
    } else {
        echo "❌ $file غير موجود\n";
    }
}

echo "\n";

// التحقق من حجم المشروع
echo "📊 حجم المشروع:\n";
$projectSize = shell_exec('du -sh . 2>&1');
if ($projectSize) {
    echo "✅ حجم المشروع: " . trim($projectSize);
} else {
    echo "❌ لا يمكن تحديد حجم المشروع";
}

echo "\n\n";

// التحقق من عدد الملفات
echo "📁 عدد الملفات:\n";
$fileCount = shell_exec('find . -type f -name "*.php" -o -name "*.blade.php" -o -name "*.css" -o -name "*.js" | wc -l 2>&1');
if ($fileCount) {
    echo "✅ عدد الملفات (PHP, Blade, CSS, JS): " . trim($fileCount);
} else {
    echo "❌ لا يمكن تحديد عدد الملفات";
}

echo "\n\n";

echo "🏁 انتهى التحقق من رفع جميع ملفات المشروع\n";
?>
