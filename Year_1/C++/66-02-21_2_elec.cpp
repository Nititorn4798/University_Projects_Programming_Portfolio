#include <iostream>
#include <string>
using namespace std;
int main(){
	int units ,pay;
	string user; 
	cout << "Input unit : ";
	cin >> units;
	if(units>0){
		if(units>=500){
			pay = units * 4;
		}
		else if(units>=100){
			pay = units * 5;
		}
		else if(units>=1){
			pay = units * 6;
		}
		if(units>=5000){
			user = "SML";
		}
		else if(units>=1000){
			user = "SME";
		}
		else if(units>=1){
			user = "GENERAL";
		}
		cout << "Payment : " << pay << endl;
		cout << "User type : " << user;
	}
	else cout << endl << "Error Please Check Your Input";
}