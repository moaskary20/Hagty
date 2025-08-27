<?php

namespace App\Services;

class ColorService
{
    /**
     * توليد متغيرات CSS للألوان الديناميكية
     */
    public static function generateCSSVariables($primaryColor = '#eb6fab')
    {
        // التأكد من أن اللون صالح
        if (!is_string($primaryColor) || empty($primaryColor)) {
            $primaryColor = '#eb6fab';
        }
        
        $hex = ltrim($primaryColor, '#');
        
        // التأكد من أن الهكس صالح
        if (!preg_match('/^[a-fA-F0-9]{6}$/', $hex)) {
            $hex = 'eb6fab'; // لون افتراضي
        }
        
        $hexArray = str_split($hex, 2);
        if (!is_array($hexArray) || count($hexArray) !== 3) {
            $hexArray = ['eb', '6f', 'ab']; // RGB افتراضي
        }
        
        $rgb = array_map('hexdec', $hexArray);
        if (!is_array($rgb) || count($rgb) !== 3) {
            $rgb = [235, 111, 171]; // RGB افتراضي
        }
        
        $variables = [];
        $variables['--hagty-primary'] = '#' . $hex;
        $variables['--hagty-primary-50'] = self::lighten($rgb, 0.95);
        $variables['--hagty-primary-100'] = self::lighten($rgb, 0.90);
        $variables['--hagty-primary-200'] = self::lighten($rgb, 0.75);
        $variables['--hagty-primary-300'] = self::lighten($rgb, 0.60);
        $variables['--hagty-primary-400'] = self::lighten($rgb, 0.30);
        $variables['--hagty-primary-500'] = '#' . $hex;
        $variables['--hagty-primary-600'] = self::darken($rgb, 0.20);
        $variables['--hagty-primary-700'] = self::darken($rgb, 0.35);
        $variables['--hagty-primary-800'] = self::darken($rgb, 0.50);
        $variables['--hagty-primary-900'] = self::darken($rgb, 0.65);
        
        return $variables;
    }
    
    /**
     * إنشاء CSS مع الألوان الديناميكية
     */
    public static function generateDynamicCSS($primaryColor = '#eb6fab')
    {
        // التأكد من أن اللون صالح
        if (!is_string($primaryColor) || empty($primaryColor)) {
            $primaryColor = '#eb6fab';
        }
        
        try {
            $variables = self::generateCSSVariables($primaryColor);
        } catch (\Exception $e) {
            // استخدام قيم افتراضية في حالة الخطأ
            $variables = self::generateCSSVariables('#eb6fab');
        }
        
        $css = ":root {\n";
        if (is_array($variables)) {
            foreach ($variables as $key => $value) {
                $css .= "    {$key}: {$value};\n";
            }
        }
        $css .= "}\n\n";
        
        $css .= "
/* تطبيق الألوان الديناميكية */
.fi-btn-primary,
.fi-btn-primary:hover,
.fi-btn-primary:focus {
    background-color: var(--hagty-primary) !important;
    border-color: var(--hagty-primary) !important;
}

.fi-sidebar-nav-item-active .fi-sidebar-nav-item-button {
    background-color: var(--hagty-primary-800) !important;
    color: var(--hagty-primary-100) !important;
}

.fi-topbar {
    background: linear-gradient(135deg, var(--hagty-primary-600), var(--hagty-primary-700)) !important;
}

.fi-link {
    color: var(--hagty-primary-300) !important;
}

.fi-link:hover {
    color: var(--hagty-primary-200) !important;
}

.fi-tabs-tab-button[aria-selected='true'] {
    color: var(--hagty-primary) !important;
    border-color: var(--hagty-primary) !important;
}

.fi-badge-primary {
    background-color: var(--hagty-primary) !important;
    color: var(--hagty-primary-50) !important;
}

.fi-input:focus {
    border-color: var(--hagty-primary) !important;
    box-shadow: 0 0 0 1px var(--hagty-primary) !important;
}
";
        
        return $css;
    }
    
    /**
     * تفتيح اللون
     */
    private static function lighten($rgb, $percent)
    {
        // التأكد من أن المصفوفة تحتوي على 3 عناصر
        if (!is_array($rgb) || count($rgb) < 3) {
            $rgb = [235, 111, 171]; // قيم افتراضية
        }
        
        $r = min(255, $rgb[0] + (255 - $rgb[0]) * $percent);
        $g = min(255, $rgb[1] + (255 - $rgb[1]) * $percent);
        $b = min(255, $rgb[2] + (255 - $rgb[2]) * $percent);
        
        return sprintf('#%02x%02x%02x', (int)$r, (int)$g, (int)$b);
    }
    
    /**
     * تغميق اللون
     */
    private static function darken($rgb, $percent)
    {
        // التأكد من أن المصفوفة تحتوي على 3 عناصر
        if (!is_array($rgb) || count($rgb) < 3) {
            $rgb = [235, 111, 171]; // قيم افتراضية
        }
        
        $r = max(0, $rgb[0] * (1 - $percent));
        $g = max(0, $rgb[1] * (1 - $percent));
        $b = max(0, $rgb[2] * (1 - $percent));
        
        return sprintf('#%02x%02x%02x', (int)$r, (int)$g, (int)$b);
    }
}
