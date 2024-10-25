import face_recognition
import os, sys
import cv2
import numpy as np
import math
import time
import mysql.connector
from datetime import datetime
def face_confidence(face_distance, face_match_threshold=0.6):
    range = (1.0 - face_match_threshold)
    linear_val = (1.0 - face_distance) / (range * 2.0)

    if face_distance > face_match_threshold:
        return str(round(linear_val * 100, 2)) + '%'
    else:
        value = (linear_val + ((1.0 - linear_val) * math.pow((linear_val - 0.5) * 2, 0.2))) * 100
        return str(round(value, 2)) + '%'

def printcom():
  print ("com!!")

class FaceRecognition:
    face_locations = []
    face_encodings = []
    face_names = []
    known_face_encodings = []
    known_face_names = []
    process_current_frame = True
    
    def __init__(self):
        self.encode_faces()

    def encode_faces(self):
        for image in os.listdir('image'):
            face_image = face_recognition.load_image_file(f"image/{image}")
            face_encoding = face_recognition.face_encodings(face_image)[0]

            self.known_face_encodings.append(face_encoding)
            self.known_face_names.append(image)
        print(self.known_face_names)

    def run_recognition(self):
        video_capture = cv2.VideoCapture(0)
        start=0
        bsuck = False
        if not video_capture.isOpened():
            sys.exit('Video source not found...')

        while True:
            ret, frame = video_capture.read()
            

            if self.process_current_frame:
                small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)

                rgb_small_frame = small_frame[:, :, ::-1]

                self.face_locations = face_recognition.face_locations(rgb_small_frame)
                self.face_encodings = face_recognition.face_encodings(rgb_small_frame, self.face_locations)
                self.face_names = []
                
                for face_encoding in self.face_encodings:
                    matches = face_recognition.compare_faces(self.known_face_encodings, face_encoding)
                    name = "Unknown"
                    confidence = '???'
                    face_distances = face_recognition.face_distance(self.known_face_encodings, face_encoding)
                    ########################setting time count down###############
                    sec = 4
                    best_match_index = np.argmin(face_distances)
                    if matches[best_match_index]:
                        name = self.known_face_names[best_match_index]
                        confidence = face_confidence(face_distances[best_match_index])
                        name=name.partition('.')[0]
                        pname=name.split("_",1)[0]
                        rname=name.split("_",2)[1]
                        fname=name.split("_",3)[2]
                        idem=name.split("_",4)[3]
                        dep=name.split("_",5)[4]
                        print(start)
                        if(start==sec):
                            
                            start=str("complete")
                            bsuck=True
                            start=int(0)
                            path='checkin_pic'
                            pname=name.split("_",1)[0]
                            rname=name.split("_",2)[1]
                            sname=name.split("_",3)[2]
                            idem=name.split("_",4)[3]
                            dep=name.split("_",5)[4]
                            print(rname)
                            print(sname)
                            dt = datetime.now()
                            dt2 = datetime.now().time()
                            ts = datetime.timestamp(dt)
                            ts2 = datetime.fromtimestamp(ts)
                            str_date_time = ts2.strftime("%d-%m-%Y_%H_%M_%S")
                            img_name = "{}_{}.jpg".format(name,str_date_time)
                            print(img_name)
                            str_date = ts2.strftime("%Y-%m-%d")
                            str_time = ts2.strftime("%H:%M:%S")
                            cv2.imwrite(os.path.join(path,img_name), frame)
                            ##########connect database
                            mydb = mysql.connector.connect(
                            host="localhost",
                            user="root",
                            password="",
                            #**ชื่อฐานข้อมูล
                            database="hr_data"
                            )
                            mycursor = mydb.cursor()
                            #"ชื่อฐานข้อมูล ชื่อtableข้อมูล"
                            if dt2.hour < 8 or (dt2.hour == 8 and dt2.minute <= 30):
                               sql=("INSERT INTO checktime(prefix_em,firstname_em,lastname_em,id_em,department_em,date_check,time_check,status_check)VALUES(%s,%s,%s,%s,%s,%s,%s,%s)")
                               val=(pname,rname,sname,idem,dep,str_date,str_time,"เข้างาน")
                               mycursor.execute(sql,val)
                               mydb.commit()
                            elif (dt2.hour == 8 and dt2.minute > 30) or (dt2.hour > 8 and dt2.hour < 17) or(dt2.hour == 17 and dt2.minute < 30) :
                               sql="INSERT INTO checktime(prefix_em,firstname_em,lastname_em,id_em,department_em,date_check,time_check,status_check) VALUES(%s,%s,%s,%s,%s,%s,%s,%s)"
                               val=(pname,rname,sname,idem,dep,str_date,str_time,"สาย")
                               mycursor.execute(sql,val)
                               mydb.commit()
                            elif (dt2.hour > 17) or (dt2.hour == 17 and dt2.minute >= 30):
                                  sql="INSERT INTO checktime(prefix_em,firstname_em,lastname_em,id_em,department_em,date_check,time_check,status_check) VALUES(%s,%s,%s,%s,%s,%s,%s,%s)"
                                  val=(pname,rname,sname,idem,dep,str_date,str_time,"ออกงาน")
                                  mycursor.execute(sql,val)
                                  mydb.commit()





                     
                            
                        else :
                            start+=1
                            time.sleep(1)
                            bsuck=False

                       
                            


                    self.face_names.append(f'{name} {start}')
                    

            self.process_current_frame = not self.process_current_frame

            for (top, right, bottom, left), name in zip(self.face_locations, self.face_names):
                top *= 4
                right *= 4
                bottom *= 4
                left *= 4
                if bsuck == False :
                    cv2.rectangle(frame, (left, top), (right, bottom), (204, 102, 255), 2)
                    cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (204, 102, 255), cv2.FILLED)
                    cv2.putText(frame, idem, (left + 6, bottom - 6), cv2.FONT_HERSHEY_DUPLEX, 0.8, (255, 255, 255), 1)
                elif bsuck == True:
                    cv2.rectangle(frame, (left, top), (right, bottom), (0, 255, 0), 2)
                    cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 255, 0), cv2.FILLED)
                    cv2.putText(frame, idem, (left + 6, bottom - 6), cv2.FONT_HERSHEY_DUPLEX, 0.8, (255, 255, 255), 1)

            cv2.imshow('Face Recognition', frame)

            if cv2.waitKey(1) == ord('q'):
                break

        video_capture.release()
        cv2.destroyAllWindows()


if __name__ == '__main__':
    fr = FaceRecognition()
    fr.run_recognition()
