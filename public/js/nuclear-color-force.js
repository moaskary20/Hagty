// ==UserScript==
// @name         Ultimate Toolbar Color Force
// @namespace    http://tampermonkey.net/
// @version      1.0
// @description  Forcefully change the toolbar color to a specific value, overriding any other styles.
// @author       Your Name
// @match        *://*/*
// @grant        none
// ==/UserScript==

/*
    ULTIMATE OVERRIDE SCRIPT
    This script is designed to be the final solution for forcing the toolbar color.
    It uses multiple strategies to ensure the style is applied and stays applied.
*/
(function() {
    'use strict';

    console.log("🚀 Initializing ULTIMATE Toolbar Color Force Script...");

    const targetSelector = '.fi-ta-header-toolbar'; // Use a simpler, more stable selector
    const colorToApply = '#dc2175';
    const colorToApplyRgb = 'rgb(220, 33, 117)';

    const applyStyles = (element) => {
        // Check the computed style, which is the final rendered style.
        // This is more reliable than checking element.style.backgroundColor.
        const computedStyle = window.getComputedStyle(element);
        if (computedStyle.backgroundColor !== colorToApplyRgb) {
            console.log(`🎨 Force applying style to ${element.className}. Current color: ${computedStyle.backgroundColor}`);
            element.style.setProperty('background-color', colorToApply, 'important');
            element.style.setProperty('background', colorToApply, 'important');
            element.style.setProperty('color', 'white', 'important');
        }
    };

    const findAndStyle = () => {
        try {
            const element = document.querySelector(targetSelector);
            if (element) {
                applyStyles(element);
            }
        } catch (e) {
            console.error("Error during findAndStyle:", e);
        }
    };

    // Strategy 1: MutationObserver - The primary, most efficient method
    const observer = new MutationObserver(() => {
        findAndStyle();
    });

    // Observe everything: child nodes, attributes, and the entire subtree.
    // This is aggressive but necessary for frameworks like Livewire/Filament.
    observer.observe(document.body, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['class', 'style'] // Watch for class/style changes
    });

    // Strategy 2: Interval - A fallback for cases the observer might miss
    setInterval(() => {
        // console.log('🔔 Interval check...');
        findAndStyle();
    }, 1000); // Check every second

    // Strategy 3: Initial Load - Run as soon as the DOM is ready
    if (document.readyState === 'complete') {
        findAndStyle();
    } else {
        document.addEventListener('DOMContentLoaded', findAndStyle);
    }

    console.log('nuclear-color-force loaded');

    // Test Script: Add a thick red border around the page
    console.log("--- SCRIPT DE TEST ACTIVÉ ---");
    console.log("Ce script devrait ajouter une bordure rouge de 5px au body.");

    // Fonction pour appliquer un style très visible pour le débogage
    function applyDebugStyle() {
        console.log("Application du style de débogage...");
        document.body.style.border = '10px solid red !important';
        console.log("Style de débogage appliqué. Si vous voyez une bordure rouge, le script s'exécute.");
    }

    // Exécuter sur DOMContentLoaded
    document.addEventListener('DOMContentLoaded', applyDebugStyle);

    // Exécuter également immédiatement si le DOM est déjà chargé
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        applyDebugStyle();
    }

    // Exécuter après un court délai pour s'assurer que tout est chargé
    setTimeout(applyDebugStyle, 500);

})();
