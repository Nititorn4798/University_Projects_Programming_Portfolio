#include <iostream>
#include <iomanip>
using namespace std;
int main(){
	
	float student = 620;
	float quota = 100 ,
	studentSci = 75 ,
	studentHu = 95 ,
	studentMan = 150  ,
	studentTech = 100 ,
	studentEdu = 200;
	float gotquotaSci ,
	gotquotaHu ,gotquotaMan ,
	gotquotaTech ,
	gotquotaEdu;
	float allgotQuota;
	
	
	gotquotaSci = (studentSci / student) * quota;
	gotquotaHu = (studentHu / student) * quota;
	gotquotaMan = (studentMan / student) * quota;
	gotquotaTech = (studentTech / student) * quota;
	gotquotaEdu = (studentEdu / student) * quota;
	allgotQuota = (gotquotaSci + gotquotaHu + gotquotaMan + gotquotaTech + gotquotaEdu);
	
	
	cout << fixed << setprecision(2) << "gotquotaSci = " << gotquotaSci 
	<< endl << "gotquotaHu = " << gotquotaHu 
	<< endl << "gotquotaMan = " << gotquotaMan 
	<< endl << "gotquotaTech = " << gotquotaTech 
	<< endl << "gotquotaEdu = " << gotquotaEdu 
	<< endl << "All Got Quota = " << allgotQuota;
}
