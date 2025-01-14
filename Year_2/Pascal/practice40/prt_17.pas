program prt_17;
uses
  crt;
var
  amount : Integer;
  price : Real;
function total(amount:Integer):Real;
begin
  total := amount * price;
  if(amount < 6) then
    total := total - (total * 0.1)
  else
    total := total - (total * 0.15);
end;
begin
  Write('Input Price per 1 piece : ');
  read(price);
  Write('Input Amount : ');
  read(amount);
  WriteLn('Total price is : ',total(amount):0:3);
  ReadLn;
end.