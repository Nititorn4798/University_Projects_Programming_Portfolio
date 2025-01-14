program prt_9;
uses
  crt;
type
  arr5 = array[1..5] of Real;
var
  com_name : String;
  com_price : arr5;
  i : Integer;
  q : Char;

function pricesum(com_price:arr5):Real;
var
  ps : Real = 0;
begin
  for i:= 1 to 5 do
    ps := ps + com_price[i];
  pricesum := ps / 5;
end;

begin
  repeat
    ClrScr;
    Write('Enter Computer Model Name : ');
    readLn(com_name);

    for i:= 1 to 5 do
    begin
      Write('Input Store ' , i , ' Price : ');
      readLn(com_price[i]);
    end;

    WriteLn('The average computer ' ,com_name , ' price of all 5 stores is : ',pricesum(com_price):0:3);
    Write('Do you want to use the program again? [Y/N]: ');
    ReadLn(q);
  until (UpCase(q) <> 'Y');
end.