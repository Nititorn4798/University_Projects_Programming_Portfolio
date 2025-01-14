program prt_16;
uses
  crt;
var
  units : Real;

function price(units:Real):Real;
  begin
    if (units <= 50) then
      price := (units * 1)
    else
      price := (50 * 1);
      price := price + ((units - 50) * 1.50);
  end;
  
begin
  ClrScr;
  Write('Input Unit : ');
  ReadLn(units);
  WriteLn('Electricity bill is : ',price(units):0:2);
  ReadLn;
end.