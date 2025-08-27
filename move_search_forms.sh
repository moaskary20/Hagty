#!/bin/bash

echo "🔍 نقل نماذج البحث إلى أسفل العنوان والإحصائيات..."
echo "=================================================="

# Function to move search form in a section file
move_search_form() {
    local file=$1
    local search_component=$2
    local section_name=$3
    
    echo "📝 تحديث $section_name..."
    
    # Create backup
    cp "$file" "${file}.backup"
    
    # Remove search form from hero section if exists
    sed -i '/@include.*search-form/d' "$file"
    
    # Find the statistics section and add search form after it
    if grep -q "الإحصائيات\|Statistics" "$file"; then
        # Add search form after statistics
        sed -i '/<!-- Statistics -->/,/<!-- Content Sections -->/ {
            /<!-- Content Sections -->/i\
                \n                <!-- Search Form -->\
                @include('\''components.'"$search_component"''\'')
        }' "$file"
    else
        # If no statistics section, add after main title
        sed -i '/<h1.*قسم.*<\/h1>/,/<!-- Content Sections -->/ {
            /<!-- Content Sections -->/i\
                \n                <!-- Search Form -->\
                @include('\''components.'"$search_component"''\'')
        }' "$file"
    fi
    
    echo "✅ تم تحديث $section_name"
}

# Update each section
move_search_form "resources/views/sections/fashion.blade.php" "fashion-search-form" "قسم الموضة"
move_search_form "resources/views/sections/wedding.blade.php" "wedding-search-form" "قسم الزفاف"
move_search_form "resources/views/sections/beauty.blade.php" "beauty-search-form" "قسم الجمال"
move_search_form "resources/views/sections/accessoraty.blade.php" "accessoraty-search-form" "قسم أكسسوراتى"
move_search_form "resources/views/sections/babies.blade.php" "babies-search-form" "قسم الأطفال"

echo ""
echo "🎉 تم نقل جميع نماذج البحث بنجاح!"
echo ""
echo "📋 التغييرات المطبقة:"
echo "🏥 قسم الصحة - تم التحديث مسبقاً"
echo "👗 قسم الموضة - تم التحديث"
echo "💒 قسم الزفاف - تم التحديث"
echo "💄 قسم الجمال - تم التحديث"
echo "🎒 قسم أكسسوراتى - تم التحديث"
echo "👶 قسم الأطفال - تم التحديث"
echo ""
echo "✨ جميع نماذج البحث الآن موجودة أسفل العنوان والإحصائيات"
