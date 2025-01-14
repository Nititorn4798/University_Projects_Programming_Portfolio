#include <iostream>
using namespace std;
int main(){
	
	float m ,f ,mp ,fp ,mf;
	m = 352; //352
	f = 178; //178
	mf = m + f;
	mp = (m*100) / mf;
	fp = (f*100) / mf;
	cout << "Student total = " << mf;
	cout << "\nMale(% of total) = " << mp;
	cout << "\nFeMale(% of total) = " << fp;
}
