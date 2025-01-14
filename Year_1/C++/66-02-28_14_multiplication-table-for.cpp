#include <iostream>
using namespace std;
int main(){
    int i ,inputM;
    cout << "Multiplication Table";
    cout << endl << "Input Number : ";
    cin >> inputM;
    for(i=1;i<=12;i++){
        cout << inputM << " x " << i << " = " << i * inputM << endl;
    }
}