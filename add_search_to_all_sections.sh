#!/bin/bash

echo "🔍 إضافة نموذج البحث إلى جميع صفحات الأقسام..."

# قائمة بجميع صفحات الأقسام
sections=("health" "fashion" "babies" "umomi" "accessoraty")

for section in "${sections[@]}"; do
    echo "📝 تحديث قسم: $section"
    
    # إضافة نموذج البحث إلى كل صفحة
    sed -i '/<div class="hidden md:flex space-x-8 space-x-reverse">/,/<\/div>/a\
                <!-- Search Bar -->\
                <div class="hidden md:block">\
                    @include('\''components.search-bar'\'')\
                </div>' "resources/views/sections/$section.blade.php"
    
    echo "✅ تم تحديث قسم $section"
done

echo "🎉 تم إضافة نموذج البحث إلى جميع الأقسام!"
