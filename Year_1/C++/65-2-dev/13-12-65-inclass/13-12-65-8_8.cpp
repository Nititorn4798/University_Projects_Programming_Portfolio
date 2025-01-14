#include <iostream>
using namespace std;
int main(){
	
	float rawcarPrice , downpayCarPercent ,
	downpayCarTotal ,payCarPrice , 
	carFinanceRate, carFinancePay ,
	installmentYear ,installmentPay ,
	totalPay ,payPerMonth;
	float monthformyear;
	
	cout << "Input Car Price : ";
	cin >> rawcarPrice;
	cout << endl << "Input Down Percent : ";
	cin >> downpayCarPercent;
	cout << endl << "Input Finance Rate Per Year : ";
	cin >> carFinanceRate;
	cout << endl << "Input Installment Year : ";
	cin >> installmentYear;
	
	monthformyear = installmentYear * 12;
	
	downpayCarTotal = ( rawcarPrice * downpayCarPercent ) /100;
	payCarPrice = rawcarPrice - downpayCarTotal;
	carFinancePay = ( payCarPrice * carFinanceRate ) / 100;
	installmentPay = carFinancePay * installmentYear;
	totalPay = payCarPrice + installmentPay;
	payPerMonth = totalPay / monthformyear;
	
	cout << endl << "Pay Per Month = " << payPerMonth;
	
	
}
