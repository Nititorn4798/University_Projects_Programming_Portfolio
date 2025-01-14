#include <iostream>
using namespace std;
int main(){
	
	int dozen ,pieceInput ,piece;
	cout << "Input Amount : ";
	cin >> pieceInput;
	
	dozen = pieceInput / 12;
	piece = pieceInput % 12;
	cout << endl << dozen << " Dozen " << piece << " Piece";
}
