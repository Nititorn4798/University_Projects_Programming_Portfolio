#include <iostream>
using namespace std;
int main(){
	
	float m ,f ,mp ,fp ,mf;
	cout << "Input Male : ";
	cin >> m;
	cout << "Input FeMale : ";
	cin >> f;
	mf = m + f;
	mp = (m*100) / mf;
	fp = (f*100) / mf;
	cout << "\nStudent total = " << mf;
	cout << "\nMale(% of total) = " << mp;
	cout << "\nFeMale(% of total) = " << fp;
}
