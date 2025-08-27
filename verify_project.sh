#!/bin/bash

# ملف التحقق السريع من حالة المشروع
# Quick verification script for project status

echo "🔍 بدء التحقق السريع من حالة المشروع..."
echo ""

# التحقق من وجود Git
if [ ! -d ".git" ]; then
    echo "❌ خطأ: هذا المجلد ليس Git repository"
    exit 1
fi

# التحقق من حالة Git
echo "📊 حالة Git:"
if [ -z "$(git status --porcelain)" ]; then
    echo "✅ Working tree نظيف - لا توجد ملفات معدلة أو جديدة"
else
    echo "⚠️  يوجد ملفات معدلة أو جديدة:"
    git status --porcelain
fi

echo ""

# التحقق من آخر commit
echo "📝 آخر commit:"
last_commit=$(git log --oneline -1)
if [ ! -z "$last_commit" ]; then
    echo "✅ $last_commit"
else
    echo "❌ لا يمكن الحصول على آخر commit"
fi

echo ""

# التحقق من حالة الـ remote
echo "🌐 حالة الـ Remote Repository:"
remote_status=$(git remote show origin)
if echo "$remote_status" | grep -q "up to date"; then
    echo "✅ الـ local repository محدث مع الـ remote"
else
    echo "⚠️  الـ local repository غير محدث مع الـ remote"
fi

echo ""

# التحقق من الـ branch الحالي
echo "🌿 الـ Branch الحالي:"
current_branch=$(git branch --show-current)
if [ ! -z "$current_branch" ]; then
    echo "✅ الـ branch الحالي: $current_branch"
else
    echo "❌ لا يمكن تحديد الـ branch الحالي"
fi

echo ""

# التحقق من الـ remote URL
echo "🔗 Remote URL:"
remote_url=$(git remote get-url origin)
if [ ! -z "$remote_url" ]; then
    echo "✅ Remote URL: $remote_url"
else
    echo "❌ لا يمكن الحصول على Remote URL"
fi

echo ""

# ملخص نهائي
echo "📋 ملخص التحقق:"
echo "================"

working_tree_clean=$([ -z "$(git status --porcelain)" ] && echo "true" || echo "false")
up_to_date=$(echo "$remote_status" | grep -q "up to date" && echo "true" || echo "false")

if [ "$working_tree_clean" = "true" ] && [ "$up_to_date" = "true" ]; then
    echo "🎉 تم التحقق بنجاح! جميع الملفات مرفوعة ومتساوية"
    echo "✅ Working tree نظيف"
    echo "✅ Local repository محدث مع الـ remote"
    echo "✅ المشروع جاهز للنشر على السيرفر"
else
    echo "⚠️  يوجد مشاكل تحتاج إلى حل:"
    if [ "$working_tree_clean" = "false" ]; then
        echo "   - قم بحفظ التغييرات: git add . && git commit -m 'message'"
    fi
    if [ "$up_to_date" = "false" ]; then
        echo "   - قم برفع التغييرات: git push origin main"
    fi
fi

echo ""

# التحقق من وجود ملفات مهمة
echo "🔍 التحقق من الملفات المهمة:"
important_files=(
    "resources/views/home.blade.php"
    "resources/views/auth/register.blade.php"
    "resources/views/components/shared-footer.blade.php"
    "public/css/home-enhancements.css"
)

for file in "${important_files[@]}"; do
    if [ -f "$file" ]; then
        echo "✅ $file موجود"
    else
        echo "❌ $file غير موجود"
    fi
done

echo ""

# التحقق من حجم المشروع
echo "📊 حجم المشروع:"
project_size=$(du -sh . 2>/dev/null)
if [ ! -z "$project_size" ]; then
    echo "✅ حجم المشروع: $project_size"
else
    echo "❌ لا يمكن تحديد حجم المشروع"
fi

echo ""

# التحقق من عدد الملفات
echo "📁 عدد الملفات:"
file_count=$(find . -type f \( -name "*.php" -o -name "*.blade.php" -o -name "*.css" -o -name "*.js" \) 2>/dev/null | wc -l)
if [ ! -z "$file_count" ]; then
    echo "✅ عدد الملفات (PHP, Blade, CSS, JS): $file_count"
else
    echo "❌ لا يمكن تحديد عدد الملفات"
fi

echo ""
echo "🏁 انتهى التحقق السريع من حالة المشروع"

# إرجاع exit code مناسب
if [ "$working_tree_clean" = "true" ] && [ "$up_to_date" = "true" ]; then
    exit 0
else
    exit 1
fi
