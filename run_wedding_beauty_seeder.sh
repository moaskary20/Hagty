#!/bin/bash

# ألوان للنصوص
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}🎉 مرحباً بك في seeder قسمي الزفاف والجمال!${NC}"
echo ""

# التحقق من وجود Laravel
if [ ! -f "artisan" ]; then
    echo -e "${RED}❌ خطأ: لا يوجد ملف artisan. تأكد من أنك في مجلد Laravel الصحيح.${NC}"
    exit 1
fi

# التحقق من قاعدة البيانات
echo -e "${YELLOW}🔍 التحقق من قاعدة البيانات...${NC}"
if ! php artisan db:show > /dev/null 2>&1; then
    echo -e "${RED}❌ خطأ: لا يمكن الاتصال بقاعدة البيانات. تأكد من إعدادات قاعدة البيانات.${NC}"
    exit 1
fi

echo -e "${GREEN}✅ تم الاتصال بقاعدة البيانات بنجاح${NC}"
echo ""

# تشغيل Seeder
echo -e "${YELLOW}🚀 بدء تشغيل WeddingAndBeautySeeder...${NC}"
echo ""

php artisan db:seed --class=WeddingAndBeautySeeder

if [ $? -eq 0 ]; then
    echo ""
    echo -e "${GREEN}✅ تم تشغيل WeddingAndBeautySeeder بنجاح!${NC}"
    echo ""
    echo -e "${BLUE}📊 ملخص البيانات المضافة:${NC}"
    echo -e "${YELLOW}💒 قسم الزفاف:${NC}"
    echo "   - مصممي فساتين الزفاف: 3"
    echo "   - منظمي الحفلات: 2"
    echo "   - فناني المكياج: 2"
    echo "   - مصففي الشعر: 2"
    echo "   - قاعات الحفلات: 2"
    echo "   - خدمات التموين: 2"
    echo "   - ديكورات الزهور: 2"
    echo "   - موردي الهدايا: 2"
    echo "   - المصورين: 2"
    echo ""
    echo -e "${YELLOW}💄 قسم الجمال:${NC}"
    echo "   - جراحي التجميل: 2"
    echo "   - مصففي الشعر: 2"
    echo "   - أطباء العناية بالبشرة: 2"
    echo "   - متخصصي الأظافر والرموش: 2"
    echo "   - أطباء التغذية: 2"
    echo "   - عيادات السبا: 2"
    echo "   - فيديوهات التدريب: 3"
    echo ""
    echo -e "${GREEN}🎉 تم إضافة جميع البيانات بنجاح!${NC}"
else
    echo ""
    echo -e "${RED}❌ حدث خطأ أثناء تشغيل Seeder${NC}"
    exit 1
fi

echo ""
echo -e "${BLUE}🔗 يمكنك الآن زيارة الصفحة الرئيسية:${NC}"
echo -e "${YELLOW}   http://localhost:8000${NC}"
echo ""
echo -e "${BLUE}🔗 أو زيارة أقسام محددة:${NC}"
echo -e "${YELLOW}   http://localhost:8000/section/wedding${NC}"
echo -e "${YELLOW}   http://localhost:8000/section/beauty${NC}"
echo ""
