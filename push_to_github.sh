#!/bin/bash

# Script to push updates to GitHub
# Usage: ./push_to_github.sh

echo "🚀 Attempting to push updates to GitHub..."

# Check if we're in a git repository
if [ ! -d ".git" ]; then
    echo "❌ Not a git repository!"
    exit 1
fi

# Check current branch
current_branch=$(git branch --show-current)
echo "📍 Current branch: $current_branch"

# Check if there are commits to push
commits_ahead=$(git rev-list --count origin/main..HEAD 2>/dev/null || echo "0")
echo "📊 Commits ahead of origin: $commits_ahead"

if [ "$commits_ahead" -eq 0 ]; then
    echo "✅ No commits to push!"
    exit 0
fi

echo "📝 Recent commits:"
git log --oneline -3

echo ""
echo "🔄 Attempting to push..."

# Try different push methods
echo "Method 1: Standard push..."
if git push origin main; then
    echo "✅ Successfully pushed to GitHub!"
    exit 0
fi

echo "❌ Method 1 failed. Trying Method 2..."

echo "Method 2: Push with verbose output..."
if git push -v origin main; then
    echo "✅ Successfully pushed to GitHub!"
    exit 0
fi

echo "❌ Method 2 failed."
echo ""
echo "🔧 Manual push required. Please use one of these methods:"
echo ""
echo "1. GitHub CLI (recommended):"
echo "   gh auth login"
echo "   git push origin main"
echo ""
echo "2. Personal Access Token:"
echo "   git push https://YOUR_USERNAME:YOUR_TOKEN@github.com/moaskary20/Hagty.git main"
echo ""
echo "3. SSH Key:"
echo "   git remote set-url origin git@github.com:moaskary20/Hagty.git"
echo "   git push origin main"
echo ""
echo "📋 Your commits are saved locally and ready to push!"
echo "📁 See GITHUB_PUSH_INSTRUCTIONS.md for detailed instructions."

exit 1
