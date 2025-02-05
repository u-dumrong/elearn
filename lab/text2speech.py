from gtts import gTTS
from playsound import playsound
import os


# รับค่าเนื้อหาที่ต้องการให้พูดจากผู้ใช้
text = input("กรุณากรอกข้อความที่ต้องการให้พูด: ")

# รับชื่อไฟล์เสียงที่ต้องการบันทึกจากผู้ใช้
filename = input("กรุณากรอกชื่อไฟล์เสียง (ไม่ต้องใส่นามสกุล): ") + ".mp3"

# กำหนดเส้นทางของโฟลเดอร์ที่ต้องการบันทึกไฟล์เสียง
folder_path = "voice"

# ตรวจสอบว่าโฟลเดอร์มีอยู่หรือไม่
if not os.path.exists(folder_path):
    os.makedirs(folder_path)  # ถ้าไม่มีโฟลเดอร์จะสร้างใหม่

# สร้างเสียงจากข้อความ
tts = gTTS(text=text, lang='th')
# สร้างชื่อไฟล์และบันทึกไฟล์เสียงในโฟลเดอร์ที่กำหนด

file_path = os.path.join(folder_path, filename)
tts.save(file_path)

print(f"ไฟล์เสียงถูกบันทึกที่: {file_path}")

# เล่นไฟล์เสียง
# os.system("ffplay output.mp3")  # สำหรับ Linux
playsound(file_path)
