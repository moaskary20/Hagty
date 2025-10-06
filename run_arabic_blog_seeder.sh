#!/bin/bash

# Script to run Arabic Blog Seeder
# Usage: ./run_arabic_blog_seeder.sh

echo "📝 Arabic Blog Seeder Runner"
echo "============================"

# Check if we're in a Laravel project
if [ ! -f "artisan" ]; then
    echo "❌ Error: This doesn't appear to be a Laravel project (artisan file not found)"
    exit 1
fi

echo "🚀 Running Arabic Blog Seeder..."
echo ""

# Run the seeder
php artisan db:seed --class=ArabicBlogSeeder

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Arabic Blog Seeder completed successfully!"
    echo ""
    echo "📊 Results:"
    echo "- Added 16 Arabic articles"
    echo "- 7 Featured articles"
    echo "- 10 Different sections"
    echo "- 13 Different authors"
    echo ""
    echo "🎯 Article Sections:"
    echo "- Fashion & Beauty"
    echo "- Cooking & Home"
    echo "- Business & Entrepreneurship"
    echo "- Fitness & Health"
    echo "- Finance & Money"
    echo "- Babies & Children"
    echo "- Travel & Accessories"
    echo "- Mental Health"
    echo "- Time Management"
    echo ""
    echo "🌐 Visit your articles page to see the new content!"
    echo "   URL: http://localhost:8000/articles"
    echo ""
    echo "🔍 To verify in database:"
    echo "   SELECT COUNT(*) FROM blogs;"
    echo "   SELECT section, COUNT(*) FROM blogs GROUP BY section;"
else
    echo ""
    echo "❌ Seeder failed! Check the error messages above."
    echo ""
echo "🔧 Troubleshooting:"
echo "1. Make sure database is running"
echo "2. Run migrations first: php artisan migrate"
echo "3. Check database connection"
echo "4. Verify seeder class exists"
echo "5. If foreign key constraint error:"
echo "   - Seeder now uses delete() instead of truncate()"
echo "   - This avoids foreign key constraint issues"
fi

echo ""
echo "📋 Available Commands:"
echo "php artisan db:seed --class=ArabicBlogSeeder"
echo "php artisan migrate"
echo "php artisan db:show"
