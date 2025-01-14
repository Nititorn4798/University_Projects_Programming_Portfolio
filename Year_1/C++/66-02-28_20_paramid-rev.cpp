#include <iostream>
using namespace std;
int main(){
    int i ,p ,op ,r ,starInput;
    cout << "Input Number : ";
    cin >> starInput;
    for(i=1;i<=starInput;i++){
        for(p=1;p<=i;p++){
            cout << "*";
        }
        cout << endl;
    }
    for(op=starInput-1;op>0;op--){
        for(r=op;r>0;r--){
            cout << "*";
        }
        cout << endl;
    }
}
