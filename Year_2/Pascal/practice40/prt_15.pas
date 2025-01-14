program prt_15;
uses
  crt;
var
  int1, int2 : Integer;
function dividenaja(int1, int2:Integer):Real;
  begin
    dividenaja := int1 / int2
  end;

begin
  ClrScr;
  Write('Enter First Integer : ');
  ReadLn(int1);
  Write('Enter Second Integer : ');
  ReadLn(int2);
  if(int2 = 0) then
    WriteLn('Cannot divide by zero')
  else
    WriteLn('Result is : ',dividenaja(int1,int2):0:2);
  ReadLn;
end.