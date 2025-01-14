program prt_29;
uses
  crt;
var
  inputHeight : Real;
  recWeight : Real;
  gender : String[6];
begin
  ClrScr;
  Write('Enter Your Gender [M , F] : ');
  ReadLn(gender);
  Write('Enter Your Height : ');
  ReadLn(inputHeight);
  if (gender = 'M') or (gender = 'm') then
  begin
    recWeight := inputHeight - 100;
  end
  else if (gender = 'F') or (gender = 'f') then
  begin
    recWeight := inputHeight - 110;
  end
  else
    WriteLn('Input Out of Range.');
  if recWeight > 0 then
  begin
    WriteLn('The recommended weight for you is ',recWeight:0:2)
  end;
  ReadLn;
end.