#include <iostream>
#include <string>
#include <cctype>
#include <limits>
#include <ctime>
#include <iomanip>
#include <cmath>
using namespace std;
int main(){
    float priceTotal ,taxVat ,GrandTotal ,serviceCharge;
    int arrayPos ,arrayPosLog ,callList ,idOrder ,amountTotal;
    int OrderLinePos ,PriceCalArray;
    int amountMenu;
    int iCheck ,i ,i_menuList;
    int errorStack;
    float ConfigtaxVat = 0.07 ,ConfigserviceCharge = 0.1 ,ConfigcurrencyValue[3] = {0.0,1,35.02}; //!Default Is 0.028560 For USD
    bool IS_switchOn ,IS_arrayForMenu ,IS_Error ,Check ,Loop ,IS_configMode ,IS_Member;
    char inputArray[1600];
    char loopChoice ,moneyChoice ,memberChoice ,loopMember;
    int configChoice;
    //!Menu Array
    string menuList[9] = {"","Charcoal-boiled pork neck","Fried Basil and Pork","Papaya salad JoJo","Fried rice with Crab","Spicy minced chicken salad","Spicy Shrimp Soup","Stewed pork leg on rice","Grilled Shrimp"};
    //!Menu Price Array
    float constMenuPrice[9] = {0,40,40,50,60,70,70,90,300};
    float menuPrice[9];
    string OrderList[801];
    string ErrorDetail[1];
    string table;
    string currencySign[3] = {"","THB","$"}; //
    int settingCurrencySign = 1 ,settingCurrencyValue = 1 ,settingDiscount = 0; //!Default Is 1 Baht 
    //!Time Function
    time_t ttime = time(0);
    char* dt = ctime(&ttime);
    string customerName;
    float moneyReceive ,moneyDiscount;
    float moneyChange;
    float ConfigMemberDiscount[2] = {0,0.12};
    float tempValue;

    Loop = true;
    while(Loop == true){

        if(settingCurrencySign == 2){
            for (i=1;i<=8;i++){
                menuPrice[i] = constMenuPrice[i];
            }
            for (i=1;i<=8;i++){
                menuPrice[i] =  menuPrice[i] * (1 / ConfigcurrencyValue[settingCurrencyValue]);
            }            
        }
        if (settingCurrencySign == 1) {
            for (i=1;i<=8;i++){
                menuPrice[i] = constMenuPrice[i];
            }
            for (i=1;i<=8;i++){
                menuPrice[i] =  menuPrice[i] * (1 / ConfigcurrencyValue[settingCurrencyValue]);
            }                   
        }
        if (settingCurrencySign == 0){
            for (i=1;i<=8;i++){
                menuPrice[i] = constMenuPrice[i];
            }
            for (i=1;i<=8;i++){
                menuPrice[i] =  menuPrice[i] * (1 / ConfigcurrencyValue[settingCurrencyValue]);
            }            
        }
        i = 0;

        //!Clear Array
        for(i=0;i<=1600;i++){
            inputArray[i] = '\000';
        }
        i = 0;

        cout << endl << "==========Nititorn's Phochana===========" << endl;
        for(i_menuList=1;i_menuList<=8;i_menuList++){
            cout << "[" << i_menuList << "] " 
            << setw(30) << left <<  menuList[i_menuList] 
            << currencySign[settingCurrencySign] 
            << menuPrice[i_menuList] << endl;
        }
        cout <<      "========================================" << endl << endl;

        cout << "Select Menu Ex.[1-9 5-2] (1 and 5 is Menu , 9 and 2 is Amount) [Max Amount Up to 9] [\"set\" for Config Mode] " << "Support up to 400 orders." << endl << "                 >>>> ";
        cin.getline(inputArray,1600);
        //!If ConfigMode No Get table 
        if(!(inputArray[0] == 's' && inputArray[1] == 'e' && inputArray[2] == 't')){
            cout << "Order from table >>>> ";
            getline(cin, table); //!Support Spacebar

            loopMember = 'F';
            errorStack = 1;
            while (loopMember == 'F') {
                cout << "Do you have a membership card? [Y | N] : ";
                cin >> memberChoice;
                cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n'); //!A common solution is to ignore all leftover characters on the line of input.
                switch (memberChoice) {
                    case 'Y' : case 'y' :
                        IS_Member = true;
                        loopMember = 'P';
                        settingDiscount = 1;
                        break;
                    case 'N' : case 'n' :
                        IS_Member = false;
                        loopMember = 'P';
                        settingDiscount = 0;
                        break;
                    default :
                        IS_Member = false;
                        cout << endl << "Error, try again! #" << errorStack << " of 10" << endl << endl;
                        loopChoice = 'F';
                        if(errorStack >= 10){
                            cout << "Exited because of a lot of error!!" << endl;
                            loopMember = 'E';
                            settingDiscount = 0;
                        }
                        errorStack++;
                        break;
                }
            }

            if(IS_Member == true){
                cout << "Enter Member Name >>>> ";
                getline(cin, customerName);                
            }else {
                cout << "Enter Customer Name (Can be empty) >>>> ";
                getline(cin, customerName);
            }

        }

        cout << endl << "========================================" << endl;

        //! Initial
        arrayPos = 0;
        OrderLinePos = 0;
        IS_switchOn = true;
        IS_arrayForMenu = true;
        arrayPosLog = 0;
        priceTotal = 0;
        IS_Error = false;
        IS_configMode = false;
        iCheck = 0;
        errorStack = 1;
        idOrder = 1;
        amountTotal = 0;

        //!Check Is Input = set
        if(inputArray[0] == 's' && inputArray[1] == 'e' && inputArray[2] == 't'){
            iCheck = 1601;
            IS_configMode = true;
            //!Config Mode
            cout << "Enter Config Mode..." << endl;
            cout << "Here are the things that can be configured : " << endl
            << "Current Currency is : " << currencySign[settingCurrencySign] << endl
            << "Current Value Currency is : " << currencySign[1] << ConfigcurrencyValue[settingCurrencyValue] << " Per " << "1 " << currencySign[settingCurrencySign] << endl
            << "VAT is : " << ConfigtaxVat * 100 << "%" << endl
            << "Service Charge is : " << ConfigserviceCharge * 100 << "%" << endl
            << "Member Discount is : " << ConfigMemberDiscount[1] * 100 << "%" << endl
            << "[1] Set Currency to Baht (THB) " << endl
            << "[2] Set Currency to U.S. Dollar ($) " << endl
            << "[3] Set Desired Currency (Custom) " << endl 
            << "[4] Set VAT (%) " << endl
            << "[5] Set Service Charge (%) " << endl
            << "[6] Set Member Discount (%) " << endl
            << "Select what you want to set." << endl
            << "                 >>>> ";
            cin >> configChoice;
            switch (configChoice) {
                case 1 :
                    if (configChoice == settingCurrencySign){
                        cout << "Nothing has changed." << endl;
                        cout << "Current Currency is : " << currencySign[settingCurrencySign] << endl;
                    }else {
                        settingCurrencySign = 1;
                        settingCurrencyValue = 1;
                        cout << "Now Current Currency is : " << currencySign[settingCurrencySign] << endl;
                    }
                    break;
                case 2 :
                    if (configChoice == settingCurrencySign){
                        cout << "Nothing has changed." << endl;
                        cout << "Current Currency is : " << currencySign[settingCurrencySign] << endl;
                    }else {
                        settingCurrencySign = 2;
                        settingCurrencyValue = 2;
                        cout << "Now Current Currency is : " << currencySign[settingCurrencySign] << endl;
                    }
                    break;
                case 3 :
                    cout << "Set Desired Currency (Custom)." << endl << "                 >>>> ";
                    cin.clear();
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    getline(cin, currencySign[0]);
                    cout << "Set Currency " << currencySign[0] << " Value [Per 1 in THB] (Custom)." << endl << "                 >>>> ";
                    cin >> ConfigcurrencyValue[0];
                    settingCurrencySign = 0;
                    settingCurrencyValue = 0;
                    cout << "Now Current Currency is : " << currencySign[settingCurrencySign] << endl;
                    cout << "Now Value Currency is : " << ConfigcurrencyValue[settingCurrencyValue] << endl;
                    break;
                case 4 :
                    cout << "Set Custom VAT (%)." << endl << "                 >>>> ";
                    cin.clear();
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    tempValue = ConfigtaxVat;
                    cin >> ConfigtaxVat;
                    if(ConfigtaxVat == (tempValue * 100)){
                        cout << "Nothing has changed." << endl;
                        cout << "VAT is : " << tempValue * 100 << "%" << endl;
                        ConfigtaxVat = tempValue;
                    }else {
                        ConfigtaxVat = (ConfigtaxVat / 100);
                        cout << "Now VAT is : " << ConfigtaxVat * 100 << "%" << endl;
                    }
                    break;
                case 5 :
                    cout << "Set Custom Service Charge (%)." << endl << "                 >>>> ";
                    cin.clear();
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    tempValue = ConfigserviceCharge;
                    cin >> ConfigserviceCharge;
                    if(ConfigserviceCharge == (tempValue * 100)){
                        cout << "Nothing has changed." << endl;
                        cout << "Service Charge is : " << tempValue * 100 << "%" << endl;
                        ConfigserviceCharge = tempValue;
                    }else {
                        ConfigserviceCharge = (ConfigserviceCharge / 100);
                        cout << "Now Service Charge is : " << ConfigserviceCharge * 100 << "%" << endl;
                    }
                    break;
                case 6 :
                    cout << "Set Custom Member Discount (%)." << endl << "                 >>>> ";
                    cin.clear();
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    tempValue = ConfigMemberDiscount[1];
                    cin >> ConfigMemberDiscount[1];
                    if(ConfigMemberDiscount[1] == (tempValue * 100)){
                        cout << "Nothing has changed." << endl;
                        cout << "Member Discount is : " << tempValue * 100 << "%" << endl;
                        ConfigMemberDiscount[1] = tempValue;
                    }else {
                        ConfigMemberDiscount[1] = (ConfigMemberDiscount[1] / 100);
                        cout << "Now Member Discount is : " << ConfigMemberDiscount[1] * 100 << "%" << endl;
                    }
                    break;
                default :
                    IS_Error = true;
                    ErrorDetail[0] = ErrorDetail[0] + " (Input Config Value Error. --> " + to_string(configChoice) + " <--)";
                    break;
            }
            if(IS_Error == false && IS_configMode == true){
                cout << "To apply the new settings, the program must be restarted." << endl;
            }
            cout << "========================================" << endl;
        }
        //!Check Input
        while (iCheck <= 1600){
            if(inputArray[0] == '-' || inputArray[0] == ' ' || (Check = isdigit(inputArray[0]) == 0)){
                IS_Error = true;
                ErrorDetail[0] = ErrorDetail[0] + " (Input First Menu Value Error. -->\"" + inputArray[0] + "\"<--)";
                inputArray[0] = '\000';
                iCheck = 1600;
            }
            if(!(Check = isdigit(inputArray[iCheck]) == 1 || inputArray[iCheck] == '-' || inputArray[iCheck] == ' ' || inputArray[iCheck] == '\000')){
                IS_Error = true;
                ErrorDetail[0] = ErrorDetail[0] + inputArray[iCheck] + " ";
            }
            if(inputArray[iCheck+1] == '\000'){
                iCheck = 1600;
            }
            iCheck++;
        }

        //! Order To Bill
        while (IS_switchOn == true && IS_Error == false && IS_configMode == false){

            while (IS_arrayForMenu == true && IS_Error == false){

                if((Check = isdigit(inputArray[arrayPos+1]) == 1) && (inputArray[arrayPos]) != '-' && (inputArray[arrayPos]) != ' '){
                    IS_Error = true;
                    ErrorDetail[0] = ErrorDetail[0] + " (Input Menu Value Error. --> " + inputArray[arrayPos+1] + " <-- [It should be \"-\".] )";
                }

                switch (inputArray[arrayPos]){
                    case '1' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[1] + "]";
                        PriceCalArray = 1;
                        break;
                    case '2' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[2] + "]";
                        PriceCalArray = 2;
                        break;
                    case '3' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[3] + "]";
                        PriceCalArray = 3;
                        break;
                    case '4' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[4] + "]";
                        PriceCalArray = 4;
                        break;
                    case '5' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[5] + "]";
                        PriceCalArray = 5;
                        break;
                    case '6' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[6] + "]";
                        PriceCalArray = 6;
                        break;
                    case '7' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[7] + "]";
                        PriceCalArray = 7;
                        break;
                    case '8' :
                        OrderList[OrderLinePos] = to_string(idOrder) + ". " + "[" + menuList[8] + "]";
                        PriceCalArray = 8;
                        break;
                    case '-' :
                        IS_arrayForMenu = false;
                        break;
                    case ' ' :    
                        IS_arrayForMenu = true;
                        break;
                    case '\000' :
                        IS_Error = true;
                        ErrorDetail[0] = ErrorDetail[0] + " (Input Menu Value Error. --> " + inputArray[arrayPos] + "(Empty)" + " <--)";
                        break;
                    default :
                        IS_Error = true;
                        ErrorDetail[0] = ErrorDetail[0] + " (Input Menu Value Error. --> " + inputArray[arrayPos] + " <--)";
                        break;
                }
                arrayPos++;
            }
            //! Char To int
            amountMenu = (int)inputArray[arrayPos] - 48; //48 is the ascii value of 0

            while (IS_arrayForMenu == false && IS_Error == false){

                if((menuPrice[PriceCalArray] * amountMenu) < 0){
                    IS_Error = true;
                    ErrorDetail[0] = ErrorDetail[0] + " Output : " + to_string(menuPrice[PriceCalArray] * amountMenu);
                }
                if(Check = isdigit(inputArray[arrayPos]) == 0) {
                    IS_Error = true;
                    ErrorDetail[0] = ErrorDetail[0] + " (Input Amount Value Error. --> " + inputArray[arrayPos] + " <--)";
                }

                OrderLinePos++;
                OrderList[OrderLinePos] = OrderList[OrderLinePos] + "Quantity : " + inputArray[arrayPos] + " Price : " + currencySign[settingCurrencySign] + to_string(menuPrice[PriceCalArray]).substr(0, to_string(menuPrice[PriceCalArray]).find(".") + 2 + 1) + " Amount : " + currencySign[settingCurrencySign] + to_string(menuPrice[PriceCalArray] * amountMenu).substr(0, to_string(menuPrice[PriceCalArray] * amountMenu).find(".") + 2 + 1);
                OrderLinePos++;
                priceTotal += menuPrice[PriceCalArray] * amountMenu;
                amountTotal += amountMenu;
                idOrder++;

                if(inputArray[arrayPos+1] == ' '){
                    IS_arrayForMenu = true;
                }else if(Check = isdigit(inputArray[arrayPos+1]) == 1) {
                    IS_Error = true;
                    ErrorDetail[0] = ErrorDetail[0] + " (Input Amount Value Error. --> " + inputArray[arrayPos+1] + " <-- [It should be empty.] )";
                }else if(inputArray[arrayPos+1] == '\000'){
                    IS_arrayForMenu = true;
                    IS_switchOn = false;
                }
                arrayPos++;
            }
            arrayPosLog += 2; //!It is index Use when cout orderlist
        }
        //!Show error if detected by Program
        if((IS_Error == true && IS_configMode == false) || (IS_Error == true && IS_configMode == true)){
            cout << "An error has occurred." << endl;
            cout << "Your Input Error At >>> " << ErrorDetail[0] << endl;
            if(!(IS_Error == true && IS_configMode == true)){
                cout << "Input must be numbers and dashes only. like [1-5 5-1] That does not include the Square Bracket. -> [] ." << endl;
            }
        }
        //!Bill Output
        if(IS_Error == false && IS_configMode == false){
            cout << "          Nititorn's Phochana" << endl
                <<  "              Guest Check" << endl;
            if(customerName != ""){
                cout << "     Customer Name : " << customerName << endl;
            }
            if(IS_Member == true){
                cout << "     You Are Member Got " << ConfigMemberDiscount[settingDiscount] * 100 << "%" << " Discount" << endl;
            }
            cout << "        Thank You for Visiting" << endl
                <<  "              TABLE : " << table << endl
                <<  "     Date : " << dt << endl

                <<  "========================================" << endl << endl;

            cout << "ID. " << "Menu." << endl;
            for(callList=0;callList<=arrayPosLog;callList++){
                cout << OrderList[callList] << endl;
            }
            cout << "========================================" << endl;

            serviceCharge = priceTotal * ConfigserviceCharge;
            taxVat = priceTotal * ConfigtaxVat;
            moneyDiscount = (ConfigMemberDiscount[settingDiscount] * (priceTotal + serviceCharge + taxVat));
            GrandTotal = priceTotal + serviceCharge + taxVat;

            cout << "    Total Qty.     : " << amountTotal << endl;
            cout << "    Sub Total      : " << currencySign[settingCurrencySign] << priceTotal << endl;
            cout << "    Service Charge : " << ConfigserviceCharge * 100 << "%" << endl;
            cout << "    Service Charge : " << currencySign[settingCurrencySign] << serviceCharge << endl;
            cout << "    VAT            : " << ConfigtaxVat * 100 << "%" << endl;
            cout << "    Total VAT      : " << currencySign[settingCurrencySign] << taxVat << endl;
            if (IS_Member == true){
                cout << "    Total          : " << currencySign[settingCurrencySign] << GrandTotal << endl;
                cout << "    Discount       : " << ConfigMemberDiscount[settingDiscount] * 100 << "%" << endl;
                cout << "    Discount       : " << currencySign[settingCurrencySign] << moneyDiscount << endl;
                cout << "    Grand Total    : " << currencySign[settingCurrencySign] << (GrandTotal - moneyDiscount)  << endl << endl;
            }else {
                cout << "    Grand Total    : " << currencySign[settingCurrencySign] << GrandTotal << endl << endl;
            }
            cout << "========================================" << endl << endl;

            cout << "      THANK YOU FOR YOUR VISIT" << endl << endl;
            cout << "========================================" << endl << endl;
        }

        moneyChoice = 'F';
        while (moneyChoice == 'F' && IS_configMode == false && IS_Error == false) {
            cout << endl << "Want to use program to Change money?? [Y | N] : ";
            cin >> moneyChoice;          
            if (moneyChoice == 'Y' || moneyChoice == 'y'){
                moneyChoice = 'P';
                cin.clear();
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                cout << endl << "Enter the amount of Cash received >>>> ";
                cin >> moneyReceive;
                if (cin.fail() == 0){
                    moneyChange = (moneyReceive) - (GrandTotal - moneyDiscount);
                    cout << endl << endl << "========================================" << endl << endl;
                    
                    if (moneyChange < 0 && moneyChange >= -0.00001){
                        moneyChange = 0;
                    }
                    if (moneyChange < 0){
                        cout << "Not Enough Money Need More !!! : " << currencySign[settingCurrencySign] << -moneyChange << endl;
                    }                 
                    else {
                        cout << "    Cash           : " << currencySign[settingCurrencySign] << moneyReceive << endl;
                        cout << "    Grand Total    : " << currencySign[settingCurrencySign] << (GrandTotal - moneyDiscount) << endl;
                        cout << "    Change         : " << currencySign[settingCurrencySign] << moneyChange << endl << endl;
                        cout << "========================================" << endl << endl;
                    }
                } 
                else {
                    cin.clear();
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    IS_Error = true;
                    ErrorDetail[0] = ErrorDetail[0] + " (Input Money Value Error. --> " + "(Input must be numbers only.)" + " <--)";
                    cout << "An error has occurred." << endl;
                    cout << "Your Input Error At >>> " << ErrorDetail[0] << endl;
                }
            }
            else if (moneyChoice == 'N' || moneyChoice == 'n'){
                cout << endl;
                moneyChoice = 'P';
            }else {
                cout << endl << "Error, try again! #" << errorStack << " of 10" << endl << endl;
                moneyChoice = 'F';
                if(errorStack >= 10){
                    cout << "Exited because of a lot of error!!" << endl;
                    moneyChoice = 'E';
                }
                errorStack++;
            }
        }

        errorStack = 1;
        do {
            cout << endl << "Want to use program again? [Y | N] : ";
            cin >> loopChoice;
            if (loopChoice == 'Y' || loopChoice == 'y'){
                Loop = true;
                loopChoice = 'P';
                cout << endl << endl;
                cin.clear();
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                //!Clear Old Data in Array
                for(i=0;i<=800;i++){
                    OrderList[i] = "";
                    if((OrderList[i+1]) == ""){
                        i = 800;
                    }
                }
                ErrorDetail[0] = "";
            }
            else if (loopChoice == 'N' || loopChoice == 'n'){
                Loop = false;
                cout << endl << "Exiting the program..." << endl << endl << "By Nititorn Nantasin 65003263019 CS" << endl << endl;
                loopChoice = 'P';
            }else {
                cout << endl << "Error, try again! #" << errorStack << " of 10" << endl << endl;
                loopChoice = 'F';
                if(errorStack >= 10){
                    cout << "Exited because of a lot of error!!" << endl;
                    Loop = false;
                    loopChoice = 'E';
                }
                errorStack++;
            }
        }while (loopChoice == 'F');
    }
    return 0;
}