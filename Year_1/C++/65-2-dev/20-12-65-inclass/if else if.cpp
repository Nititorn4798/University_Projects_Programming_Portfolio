#include <iostream>
using namespace std;
int main(){
	
	float bmi;
	cout << "Input Your BMI : ";
	cin >> bmi;
	
	if (bmi >= 30){
		cout << "You are dangerous obesity";
	}else if (bmi <= 29.9 && bmi >= 25){
		cout << "You are obesity";
	}else if (bmi <= 24.9 && bmi >= 23){
		cout << "You are overweight";
	}else if (bmi <= 22.9 && bmi >= 18.5){
		cout << "You are slim";
	}else if (bmi <= 18.4 && bmi >= 10){
		cout << "You are underweight";
	}else if (bmi < 10){
		cout << "ARE YOU KIDDING ME?\n" << "\nPlease Check Your Input BMI";
	}	
}
