program prt_28;
uses
  crt;
var
  UsedUnits : Real;
  TotalPay : Real;
begin
  ClrScr;
  Write('Enter the unit of water : ');
  ReadLn(UsedUnits);
  if (UsedUnits >= 1) and (UsedUnits <= 15) then
  begin
    TotalPay := UsedUnits * 2;
  end
  else if (UsedUnits >= 16) and (UsedUnits <= 45) then
  begin
    TotalPay := UsedUnits * 2.5;
  end
  else if (UsedUnits >= 46) then
  begin
    TotalPay := UsedUnits * 3;
  end
  else
    WriteLn('Input Out Of Range!!');
  if TotalPay > 0 then
  begin
    TotalPay := TotalPay + 25;
    WriteLn('The water bill that you have to pay is ',TotalPay:0:2);
  end;
  ReadLn;
end.