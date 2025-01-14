#include <iostream>
using namespace std;
int main(){
    int i = 1 ,inputM;
    cout << "Multiplication Table";
    cout << endl << "Input Number : ";
    cin >> inputM;
    while(i<=12){
        cout << inputM << " x " << i << " = " << i * inputM << endl;
        i++;
    }
}