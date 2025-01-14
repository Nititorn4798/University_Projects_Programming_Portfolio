#include <iostream>
using namespace std;
int main(){
    int i = 1 ,inputM;
    cout << "Multiplication Table";
    cout << endl << "Input Number : ";
    cin >> inputM;
    do{
        cout << inputM << " x " << i << " = " << i * inputM << endl;
        i++;
    }while(i<=12);
}