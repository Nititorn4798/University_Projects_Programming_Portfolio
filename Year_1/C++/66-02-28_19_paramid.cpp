#include <iostream>
using namespace std;
int main(){
    int i ,p ,starInput;
    cout << "Input Number : ";
    cin >> starInput;
    for(i=1;i<=starInput;i++){
        for(p=1;p<=i;p++){
            cout << "*";
        }
        cout << endl;
    }
}
