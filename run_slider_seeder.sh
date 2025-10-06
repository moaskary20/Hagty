#!/bin/bash

# Script to run slider seeders
# Usage: ./run_slider_seeder.sh [seeder_name]

echo "🎯 Slider Seeder Runner"
echo "======================="

# Check if we're in a Laravel project
if [ ! -f "artisan" ]; then
    echo "❌ Error: This doesn't appear to be a Laravel project (artisan file not found)"
    exit 1
fi

# Default seeder
DEFAULT_SEEDER="ComprehensiveSliderSeeder"

# Get seeder name from argument or use default
SEEDER_NAME=${1:-$DEFAULT_SEEDER}

echo "📋 Available Seeders:"
echo "1. ComprehensiveSliderSeeder (8+6 banners) - RECOMMENDED"
echo "2. HomePageSliderSeeder (5+4 banners) - Basic"
echo "3. LocalSliderImagesSeeder (5+4 banners) - Local images"

echo ""
echo "🚀 Running: $SEEDER_NAME"
echo ""

# Run the seeder
echo "⏳ Running seeder..."
php artisan db:seed --class=$SEEDER_NAME

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Seeder completed successfully!"
    echo ""
    echo "📊 Results:"
    echo "- Forasy Banners (Main Slider): Checked"
    echo "- Sponsor Banners (Secondary Slider): Checked"
    echo ""
    echo "🌐 Visit your homepage to see the new slider content!"
    echo "   URL: http://localhost:8000"
    echo ""
    echo "🔍 To verify in database:"
    echo "   SELECT COUNT(*) FROM forasy_banners;"
    echo "   SELECT COUNT(*) FROM sponsor_banners;"
else
    echo ""
    echo "❌ Seeder failed! Check the error messages above."
    echo ""
    echo "🔧 Troubleshooting:"
    echo "1. Make sure database is running"
    echo "2. Run migrations first: php artisan migrate"
    echo "3. Check database connection"
    echo "4. Verify seeder class exists"
fi

echo ""
echo "📋 Usage Examples:"
echo "./run_slider_seeder.sh ComprehensiveSliderSeeder"
echo "./run_slider_seeder.sh HomePageSliderSeeder"
echo "./run_slider_seeder.sh LocalSliderImagesSeeder"
