#include <iostream>
#include <string>
#include <cctype>
#include <ios>
#include <limits>
#include <time.h>
using namespace std;
int main(){
	
	int check ,i;
	int bd_d ,bd_m ,bd_y;
	char gender ,ageChar[3];
	char firstName[20] ,lastName[20];
	char id_char[1];
	string Gender ,id ,nationality;
	string bd_M[12] = {"January" ,"February" ,"March" ,"April" ,"May" ,"June" ,"July" ,"August" ,"September" ,"October" ,"November" ,"December"};
	
	cout << "|\\--------Personal Information Recorder--------/|\n\n";
	//gender
	cout << "Input Your Gender [Male , M : FeMale , F] : ";
	cin >> gender;
	cin.ignore(numeric_limits<streamsize>::max(),'\n');
	
	if ( check = isalpha(gender) == 0){
		cout << "\nCheck Your Input";
		return 0;
	}else if (gender == 'M' || gender == 'm'){
		gender = 'M';
	}else if (gender == 'F' || gender == 'f'){
		gender = 'F';
	}
		
	switch(gender){
		
		case 'M':
	//First Name		
			Gender = "Male";
			cout << "Your Are Male.\n";
			cout << "\nInput Your First Name : ";
			cin >> firstName;
			i = 0;
			while (i <= 20){
			
				if (check = isdigit(firstName[i]) == 1){
					cout << "\nCheck Your Input";
					return 0;
				}
			i++;
			}
			if ( islower(firstName[0]) ){
				firstName[0] = toupper(firstName[0]);
			}
	//Last Name	
			cout << "\nInput Your Last Name : ";
			cin >> lastName;
			i = 0;
			while (i <= 20){
			
				if (check = isdigit(lastName[i]) == 1){
					cout << "\nCheck Your Input";
					return 0;
				}
			i++;
			}
			if ( islower(lastName[0]) ){
				lastName[0] = toupper(lastName[0]);
			}
			
			cout << "\nInput Your Age : ";
			cin >> ageChar;
			cin.ignore(numeric_limits<streamsize>::max(),'\n');
			
			i = 0;
	//Age		
			if (ageChar[3] == ' '){
				check = 2;
			}
			
			while (i <= check){
			
				if (check = isdigit(ageChar[i]) == 0){
					cout << "\nCheck Your Input";
					return 0;
				}
			i++;
			}
	//ID			
			cout << "\nInput Your National ID Card (13) : ";
			cin >> id;
			if (id.size() != 13){
				cout << "\nCheck Your Input";
				return 0;
			}

	//Birth Day
			cout << "\nInput Your Birth [Day] Month Year : ";
			cin >> bd_d;
			cin.ignore(numeric_limits<streamsize>::max(),'\n');
			while (bd_d < 1 || bd_d > 31) {
				cout << "Your Input Day Is Wrong\n";
				cout << "\nInput Your Birth [Day] Month Year Again : ";
				cin >> bd_d;
				cin.ignore(numeric_limits<streamsize>::max(),'\n');		
			}
			
			
			cout << "\nInput Your Birth Day [Month] Year : ";
			cin >> bd_m;
			cin.ignore(numeric_limits<streamsize>::max(),'\n');
			while (bd_m < 1 || bd_m > 12) {
				cout << "Your Input Month Is Wrong\n";
				cout << "\nInput Your Birth Day [Month] Year Again : ";
				cin >> bd_m;	
				cin.ignore(numeric_limits<streamsize>::max(),'\n');	
			}
			
			cout << "\nInput Your Birth Day Month [Year] : ";
			cin >> bd_y;
			while (bd_y < 1900 || bd_y > 2566) {
				cout << "Your Input Year Maybe Wrong\n";
				cout << "\nInput Your Birth Day Month [Year] Again : ";
				cin >> bd_y;			
			}
			
			if (bd_y > 2400){
				bd_y -= 543;
			}
			
			id_char[0] = id[0];
			switch(id_char[0]){
				
				case '1':
					nationality = "Thai";
				break;
				case '2':
					nationality = "Thai";
				break;
				case '3':
					nationality = "Thai or Foreigner";					
				break;
				case '4':
					nationality = "Thai or Foreigner";
				break;
				case '5':
					nationality = "Thai or Foreigner";
				break;
				case '6':
					nationality = "Thai Temporary";					
				break;
				case '7':
					nationality = "Children of Foreigner born in Thailand";					
				break;
				case '8':
					nationality = "Foreigner";
				break;
				case '9':
					nationality = "Thai Royal Family";
				break;
				case '0':
					nationality = "Maybe you're an alien.";				
				break;									
			}

	//Output		
			cout << "\n|\\------Your Information------/|\n" << "Name : " << firstName << "  " << lastName << endl << "Gender : " << Gender << endl << "Age : " << ageChar << endl << "National ID Card : " << id << endl;
			cout << "Your Nationality Are : " << nationality << endl;
			cout << "Your Birth Day is : " << bd_d << " " << bd_M[bd_m-1] << " " << bd_y;

			break;
			
		case 'F':
			srand(time(NULL));
			cout << "Your Are Female.\n";
			cout << "You don't need to fill out the infomation. because the information is already in the system.";
			cout << "\nFree Couple For You Here : ";
			for (int i = 0; i < 13; i++){
				cout << rand() % 9 + 1;
			}
			cout << "***";
			break;
						
		default:
			cout << "\nError At Default : Check Your Input";
			break;	
	}
}
