#!/bin/bash

echo "🔍 إضافة نماذج البحث المتخصصة للأقسام..."

# قسم الموضة
echo "📝 إضافة نموذج البحث لقسم الموضة..."
sed -i '/<!-- Hero Section -->/a\        <!-- Fashion Search Form -->\n        <div class="max-w-4xl mx-auto mb-8">\n            @include('\''components.fashion-search-form'\'')\n        </div>' resources/views/sections/fashion.blade.php

# قسم الزفاف
echo "📝 إضافة نموذج البحث لقسم الزفاف..."
sed -i '/<!-- Hero Section -->/a\        <!-- Wedding Search Form -->\n        <div class="max-w-4xl mx-auto mb-8">\n            @include('\''components.wedding-search-form'\'')\n        </div>' resources/views/sections/wedding.blade.php

# قسم الجمال
echo "📝 إضافة نموذج البحث لقسم الجمال..."
sed -i '/<!-- Hero Section -->/a\        <!-- Beauty Search Form -->\n        <div class="max-w-4xl mx-auto mb-8">\n            @include('\''components.beauty-search-form'\'')\n        </div>' resources/views/sections/beauty.blade.php

# قسم أكسسوراتى
echo "📝 إضافة نموذج البحث لقسم أكسسوراتى..."
sed -i '/<!-- Hero Section -->/a\        <!-- Accessoraty Search Form -->\n        <div class="max-w-4xl mx-auto mb-8">\n            @include('\''components.accessoraty-search-form'\'')\n        </div>' resources/views/sections/accessoraty.blade.php

# قسم الأطفال
echo "📝 إضافة نموذج البحث لقسم الأطفال..."
sed -i '/<!-- Hero Section -->/a\        <!-- Babies Search Form -->\n        <div class="max-w-4xl mx-auto mb-8">\n            @include('\''components.babies-search-form'\'')\n        </div>' resources/views/sections/babies.blade.php

echo "✅ تم إضافة نماذج البحث المتخصصة لجميع الأقسام!"
echo ""
echo "📋 الأقسام المحدثة:"
echo "🏥 قسم الصحة - البحث في الأطباء، المستشفيات، الصيدليات"
echo "👗 قسم الموضة - البحث في اتجاهات الموضة، الفيديوهات، الدورات"
echo "💒 قسم الزفاف - البحث في مصممي فساتين، منظمي الحفلات، فناني المكياج"
echo "💄 قسم الجمال - البحث في جراحي التجميل، مصففي الشعر، محلات التجميل"
echo "🎒 قسم أكسسوراتى - البحث في الكورسات، الطلاب، المحلات"
echo "👶 قسم الأطفال - البحث في معلومات الأطفال"
echo ""
echo "🎉 تم إضافة نظام البحث المتخصص بنجاح!"
