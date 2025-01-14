#include <iostream>
using namespace std;
int main(){
    int i ,m ,inputM_Start ,inputM_End;
    cout << "Multiplication Table";
    cout << endl << "Input Number Start : ";
    cin >> inputM_Start;
    cout << endl << "Input Number End : ";
    cin >> inputM_End;
    for(i=inputM_Start;i<=inputM_End;i++){
        for(m=1;m<=12;m++){
            cout << "\t" << i << " x " << m << " = " << i * m << endl;           
        }
        cout << "===================================" << endl;
    }
}