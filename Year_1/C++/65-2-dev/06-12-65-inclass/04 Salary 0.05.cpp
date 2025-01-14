#include <iostream>
using namespace std;
int main(){

	float Salary, TotalSalary, Vat;
	cout << "Input Salary : ";
	cin >> Salary;
	Vat = Salary * 0.05;
	TotalSalary = Salary - Vat;
	cout << "Salary : " << TotalSalary;
	return 0;
	
}
