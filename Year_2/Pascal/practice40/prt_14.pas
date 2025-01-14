program prt_14;
uses
  crt;
var
  amount : Integer;
function priceall(amount:Integer):Real;
  begin
    if (amount <= 10) then
      priceall := amount * 10
    else
      priceall := amount * 5
  end;
begin
  ClrScr;
  Write('Input Number of production : ');
  ReadLn(amount);
  WriteLn('All prices are : ',priceall(amount):0:2);
  ReadLn;
end.