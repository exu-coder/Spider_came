#!/usr/bin/env python3
"""
Deep Sea PHP Server Runner
Runs PHP built-in server with all required configurations
"""

import os
import sys
import subprocess
import platform
import time
import socket
import webbrowser
import json
import shutil
from pathlib import Path

# ─── CONFIG ──────────────────────────────────────────────────────
CONFIG = {
    "host": "127.0.0.1",
    "port": 8000,
    "php_version": "8.2",
    "document_root": os.path.dirname(os.path.abspath(__file__)),
    "auto_open_browser": True,
    "timeout": 30
}

# ─── COLORS ──────────────────────────────────────────────────────
class Colors:
    HEADER = '\033[95m'
    BLUE = '\033[94m'
    CYAN = '\033[96m'
    GREEN = '\033[92m'
    YELLOW = '\033[93m'
    RED = '\033[91m'
    BOLD = '\033[1m'
    UNDERLINE = '\033[4m'
    END = '\033[0m'

def print_banner():
    """Print beautiful startup banner"""
    banner = f"""
{Colors.CYAN}{Colors.BOLD}╔═══════════════════════════════════════════════════════════════╗
║                                                                   ║
║   🌊 {Colors.GREEN}𝐄𝐗𝐔 𝐂𝐎𝐃𝐄𝐑 ─𑁍┊𝐀𝐩𝐩𝐫𝐨𝐯𝐞𝐝 𝐁𝐨𝐭{Colors.CYAN}                     ║
║                                                                   ║
║   📸 Photos  🎤 Audio  🎥 Video  📍 Location                     ║
║   🚀 PHP Server with Telegram Integration                       ║
║                                                                   ║
╚═══════════════════════════════════════════════════════════════════╝{Colors.END}
    """
    print(banner)

def check_php():
    """Check if PHP is installed and get version"""
    try:
        # Try to find PHP
        php_paths = []
        
        # Common PHP paths
        if platform.system() == "Windows":
            possible_paths = [
                "php.exe",
                "C:\\php\\php.exe",
                "C:\\xampp\\php\\php.exe",
                "C:\\wamp64\\bin\\php\\php.exe",
                "C:\\laragon\\bin\\php\\php.exe"
            ]
        else:
            # Linux/Mac
            possible_paths = [
                "php",
                "/usr/bin/php",
                "/usr/local/bin/php",
                "/opt/homebrew/bin/php",
                "/usr/local/opt/php/bin/php"
            ]
        
        for php_path in possible_paths:
            try:
                result = subprocess.run(
                    [php_path, "-v"],
                    capture_output=True,
                    text=True,
                    timeout=5
                )
                if result.returncode == 0:
                    version_line = result.stdout.split('\n')[0]
                    version = version_line.split(' ')[1] if ' ' in version_line else "Unknown"
                    return php_path, version
            except (subprocess.TimeoutExpired, FileNotFoundError):
                continue
        
        return None, None
        
    except Exception as e:
        return None, None

def install_php_windows():
    """Guide to install PHP on Windows"""
    print(f"\n{Colors.YELLOW}⚠️  PHP is not installed!{Colors.END}")
    print(f"\n{Colors.BOLD}📥 To install PHP on Windows:{Colors.END}")
    print("  1. Download PHP from: https://windows.php.net/download/")
    print("  2. Extract to C:\\php")
    print("  3. Add C:\\php to your PATH environment variable")
    print("  4. Restart your terminal")
    print(f"\n{Colors.BOLD}📦 Or install XAMPP/WAMP/Laragon:{Colors.END}")
    print("  - XAMPP: https://www.apachefriends.org/")
    print("  - WAMP: http://www.wampserver.com/")
    print("  - Laragon: https://laragon.org/")
    sys.exit(1)

def install_php_mac():
    """Guide to install PHP on Mac"""
    print(f"\n{Colors.YELLOW}⚠️  PHP is not installed!{Colors.END}")
    print(f"\n{Colors.BOLD}📥 To install PHP on Mac:{Colors.END}")
    print("  1. Using Homebrew:")
    print("     brew install php")
    print("  2. Or download from: https://www.php.net/downloads")
    print("  3. Restart your terminal")
    sys.exit(1)

def install_php_linux():
    """Guide to install PHP on Linux"""
    print(f"\n{Colors.YELLOW}⚠️  PHP is not installed!{Colors.END}")
    print(f"\n{Colors.BOLD}📥 To install PHP on Linux:{Colors.END}")
    print("  Ubuntu/Debian:")
    print("    sudo apt update")
    print("    sudo apt install php php-curl php-json php-mbstring")
    print("\n  CentOS/RHEL/Fedora:")
    print("    sudo dnf install php php-curl php-json php-mbstring")
    print("\n  Arch Linux:")
    print("    sudo pacman -S php php-curl php-json")
    sys.exit(1)

def check_required_files():
    """Check if required files exist"""
    required_files = [
        "index.php",
        "Logo.png",
        "background.png",
        "whatsapp.png",
        "telegram.png",
        "instagram.png",
        "tiktok.png",
        "facebook.png",
        "discord.png"
    ]
    
    missing_files = []
    for file in required_files:
        if not os.path.exists(file):
            missing_files.append(file)
    
    if missing_files:
        print(f"\n{Colors.YELLOW}⚠️  Missing files:{Colors.END}")
        for file in missing_files:
            print(f"  ❌ {file}")
        print(f"\n{Colors.BOLD}📁 Please add these files to the project directory.{Colors.END}")
        return False
    
    return True

def get_local_ip():
    """Get local IP address"""
    try:
        s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
        s.connect(("8.8.8.8", 80))
        ip = s.getsockname()[0]
        s.close()
        return ip
    except:
        return "127.0.0.1"

def create_requirements_txt():
    """Create requirements.txt for Python dependencies"""
    requirements = """# Python dependencies for Deep Sea Telegram Bot
# These are optional - only needed if you want Python features

# Flask (for Python version)
Flask==2.3.3
flask-cors==4.0.0

# Requests (for Telegram API)
requests==2.31.0

# Pillow (for image processing)
Pillow>=10.4.0

# For the PHP server runner
colorama==0.4.6

# For console styling
termcolor==2.3.0
"""
    
    with open("requirements.txt", "w") as f:
        f.write(requirements)
    print(f"{Colors.GREEN}✅ Created requirements.txt{Colors.END}")

def create_php_info():
    """Create a PHP info file for testing"""
    php_info = """<?php
phpinfo();
?>"""
    with open("phpinfo.php", "w") as f:
        f.write(php_info)
    print(f"{Colors.GREEN}✅ Created phpinfo.php for testing{Colors.END}")

def check_php_extensions():
    """Check if required PHP extensions are installed"""
    required_extensions = ["curl", "json", "mbstring", "fileinfo"]
    missing = []
    
    try:
        result = subprocess.run(
            ["php", "-m"],
            capture_output=True,
            text=True,
            timeout=10
        )
        installed = result.stdout.lower()
        
        for ext in required_extensions:
            if ext not in installed:
                missing.append(ext)
    except:
        missing = required_extensions
    
    return missing

def start_php_server():
    """Start PHP built-in server"""
    print(f"\n{Colors.BOLD}🚀 Starting PHP Server...{Colors.END}")
    
    host = CONFIG["host"]
    port = CONFIG["port"]
    doc_root = CONFIG["document_root"]
    
    # Get local IP
    local_ip = get_local_ip()
    
    # Check PHP
    php_path, php_version = check_php()
    
    if not php_path:
        print(f"{Colors.RED}❌ PHP is not installed!{Colors.END}")
        system = platform.system()
        if system == "Windows":
            install_php_windows()
        elif system == "Darwin":  # Mac
            install_php_mac()
        else:  # Linux
            install_php_linux()
        return
    
    print(f"{Colors.GREEN}✅ PHP Found: {php_path} (v{php_version}){Colors.END}")
    
    # Check PHP extensions
    missing_extensions = check_php_extensions()
    if missing_extensions:
        print(f"{Colors.YELLOW}⚠️  Missing PHP extensions: {', '.join(missing_extensions)}{Colors.END}")
        print(f"{Colors.BOLD}📦 Install them using:{Colors.END}")
        if platform.system() == "Windows":
            print("  Enable extensions in php.ini")
        else:
            print(f"  sudo apt install php-{'-'.join(missing_extensions)}")
            print(f"  # Or: sudo dnf install php-{'-'.join(missing_extensions)}")
    
    # Change to document root
    os.chdir(doc_root)
    
    # Build command
    cmd = [
        php_path,
        "-S",
        f"{host}:{port}",
        "-t",
        doc_root
    ]
    
    print(f"\n{Colors.BLUE}📡 Server Details:{Colors.END}")
    print(f"  📁 Root: {doc_root}")
    print(f"  🌐 Host: {host}")
    print(f"  🔌 Port: {port}")
    print(f"  📱 Local: http://{host}:{port}")
    print(f"  🌍 Network: http://{local_ip}:{port}")
    
    print(f"\n{Colors.CYAN}{Colors.BOLD}📤 Press Ctrl+C to stop the server{Colors.END}")
    
    # Open browser
    if CONFIG["auto_open_browser"]:
        try:
            webbrowser.open(f"http://{host}:{port}")
            print(f"{Colors.GREEN}✅ Browser opened at http://{host}:{port}{Colors.END}")
        except:
            pass
    
    # Start server
    print(f"\n{Colors.BOLD}➜ Server is running...{Colors.END}\n")
    
    try:
        subprocess.run(cmd)
    except KeyboardInterrupt:
        print(f"\n{Colors.YELLOW}🛑 Server stopped{Colors.END}")
    except Exception as e:
        print(f"{Colors.RED}❌ Error: {e}{Colors.END}")

def main():
    """Main function"""
    # Clear screen
    os.system('cls' if platform.system() == 'Windows' else 'clear')
    
    # Print banner
    print_banner()
    
    # Check required files
    if not check_required_files():
        print(f"\n{Colors.BOLD}📝 Required files for Deep Sea Telegram Bot:{Colors.END}")
        print("  ✅ index.php (main file)")
        print("  ✅ Logo.png (profile picture)")
        print("  ✅ background.png (background image)")
        print("  ✅ whatsapp.png, telegram.png, instagram.png, tiktok.png, facebook.png, discord.png")
        print("\n  💡 You can download placeholder images or use your own.")
        
        # Create placeholder info
        print(f"\n{Colors.BOLD}📦 Creating sample files...{Colors.END}")
        os.makedirs("uploads", exist_ok=True)
        os.makedirs("logs", exist_ok=True)
        os.makedirs("error", exist_ok=True)
        
        # Create error pages
        with open("error/403.html", "w") as f:
            f.write("""<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><h1>403 Forbidden</h1><p>Access denied.</p></body></html>""")
        with open("error/404.html", "w") as f:
            f.write("""<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>404 Not Found</h1><p>Page not found.</p></body></html>""")
        with open("error/500.html", "w") as f:
            f.write("""<!DOCTYPE html><html><head><title>500 Internal Server Error</title></head><body><h1>500 Internal Server Error</h1><p>Something went wrong.</p></body></html>""")
        
        print(f"{Colors.GREEN}✅ Created error pages{Colors.END}")
        
        # Create .htaccess
        with open(".htaccess", "w") as f:
            f.write("""# ─── DISABLE DIRECTORY LISTING ────────────────────────────────
Options -Indexes

# ─── PROTECT SENSITIVE FILES ──────────────────────────────────
<FilesMatch "\\.(php|ini|log|sql|sqlite|db|json|env|yml|yaml)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# ─── ALLOW INDEX.PHP ONLY ─────────────────────────────────────
<Files "index.php">
    Order Allow,Deny
    Allow from all
</Files>

# ─── BLOCK CONFIG FILES ────────────────────────────────────────
<FilesMatch "^(config|settings|\\.env|\\.htaccess|\\.htpasswd)">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# ─── BLOCK ACCESS TO SENSITIVE FOLDERS ────────────────────────
RedirectMatch 403 ^/uploads/.*$
RedirectMatch 403 ^/logs/.*$

# ─── SECURITY HEADERS ──────────────────────────────────────────
<IfModule mod_headers.c>
    Header set X-Content-Type-Options "nosniff"
    Header set X-XSS-Protection "1; mode=block"
    Header set X-Frame-Options "DENY"
    Header set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>
""")
        print(f"{Colors.GREEN}✅ Created .htaccess{Colors.END}")
        
        # Create requirements.txt
        create_requirements_txt()
        
        print(f"\n{Colors.YELLOW}⚠️  Please add your images and restart the server.{Colors.END}")
        sys.exit(0)
    
    # Create requirements if missing
    if not os.path.exists("requirements.txt"):
        create_requirements_txt()
    
    # Start the server
    start_php_server()

if __name__ == "__main__":
    main()
