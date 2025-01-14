program prt_25;
uses
  crt;
var
  Hours, Rates, Gross, Ext : Real;
begin
  ClrScr;
  Write('Input Working Hours : ');
  ReadLn(Hours);
  Write('Input Rates : ');
  ReadLn(Rates);
  Gross := Rates * Hours;
  WriteLn('Gross is ',Gross:0:2);
  if Hours > 40 then
    begin
      Ext := Rates * ((Hours - 40) * 0.5);
      WriteLn('Bonus is ',Ext:0:2);
    end;
  ReadLn;
end.