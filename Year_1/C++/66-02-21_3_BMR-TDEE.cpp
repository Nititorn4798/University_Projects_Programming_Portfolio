#include <iostream>
#include <string>
using namespace std;
int main(){
	char gender;
	int age ,choice;
	float height ,weight ,BMR ,TDEE;
	
	cout << "Enter Gender [M or F] : ";
	cin >> gender;
	cout << "Enter Height (cm) : ";
	cin >> height;
	cout << "Enter Weight (kg) : ";
	cin >> weight;
	cout << "Enter age : ";
	cin >> age;
	cout << endl << "Enter 1 - I Worked with And do not exercise at all.";
	cout << endl << "Enter 2 - Exercise or sports 1-3 days a little over a week.";
	cout << endl << "Enter 3 - Moderate exercise or sports 3-5 days for about a week.";
	cout << endl << "Enter 4 - Exercise or sport seriously. About 6-7 days a week.";
	cout << endl << "Enter 5 - Exercise or play sports hard every day, morning and evening.";
	
	cout << endl << "Enter activity number [1-5] : ";
	cin >> choice;
	
	if(gender=='M'||gender=='m'){
		BMR = 66 + (13.7 * weight) + (5 * height) - (6.8 * age);
	}
	else if(gender=='F'||gender=='f'){
		BMR = 665 + (9.6 * weight) + (1.8 * height) - (4.7 * age);
	}
	
	switch(choice){
		case 1 : {
			TDEE = BMR * 1.2;
			break;
		}
		case 2 : {
			TDEE = BMR * 1.375;
			break;
		}
		case 3 : {
			TDEE = BMR * 1.55;
			break;
		}
		case 4 : {
			TDEE = BMR * 1.725;
			break;
		}
		case 5 : {
			TDEE = BMR * 1.9;
			break;
		}
		default : {
			cout << "Error Please Check Your Input";
			break;
		}
	}
	cout << endl << "Your BMR (Basal Metabolic Rate) : " << BMR;
	cout << endl << "Your TDEE (Total Daily Energy Expenditure) : " << TDEE;	
}