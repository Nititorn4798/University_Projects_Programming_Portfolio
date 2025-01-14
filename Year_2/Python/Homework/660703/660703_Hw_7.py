#การบ้าน 03-m07-66 7ข้อ
print('โปรแกรมคำนวณจำนวนนักเรียนและร้อยละ')
studentMale = float(input('กรอกจำนวนนักเรียนชาย = ')) ; studentFemale = float(input('กรอกจำนวนนักเรียนหญิง = '))
print(f'จำนวนนักเรียนทั้งหมด = {studentMale + studentFemale}')
print(f'จำนวนนักเรียนนักเรียนชายคิดเป็น (%) = {((studentMale / (studentMale + studentFemale)) * 100):.2f}%')
print(f'จำนวนนักเรียนนักเรียนหญิงคิดเป็น (%) = {((studentFemale / (studentMale + studentFemale)) * 100):.2f}%')