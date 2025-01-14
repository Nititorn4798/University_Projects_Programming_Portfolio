program v2;
uses
  crt;
var
  Code : String[11];
  Name : String[50];
  Age : Integer;
  Sex, Stat : Char;
  pref, sexf, statf : String[20];
  line : String = '-----------------------------------------------------------------------------';
  LenName, LenPref, LenSexF : Integer;
  i, x : Integer;

begin

  ClrScr;
  Write('Input Your Code [11] :::> ');
  ReadLn(Code);
  Write('Input Your Name :::> ');
  ReadLn(Name);
  Write('Input Your Age :::> ');
  ReadLn(Age);
  Write('Input Your Sex [M/F/H] :::> ');
  ReadLn(Sex);
  Write('Input Your Status [S/M/D/R] :::> ');
  ReadLn(Stat);
  
(*  Code := '65003263019';
  Name := 'Nititorn Nantasin';
  Age := 19;
  Sex := 'm';
  Stat := 's';*)

  if (Sex = 'm') or (Sex = 'M') then
  begin
    pref := 'Mr. ';
    sexf := 'Male';
  end
  else
  begin
    if UpCase(Sex) = 'H' then
      begin
        pref := '';
        sexf := 'LGBTQ';
      end
      else
      begin
        pref := 'Ms. ';
        sexf := 'FeMale';
      end;
  end;

  case (Stat) of
    'S','s' : statf := 'Single';
    'M','m' : statf := 'Married';
    'D','d' : statf := 'Divorce';
    'R','r' : statf := 'Pass away';
    else
      statf := 'Not specified';
  end;

  ClrScr;
  WriteLn('Code   : ',Code);
  Write  ('Name   : '); Write(pref); WriteLn(Name);
  WriteLn('Age    : ',Age);
  WriteLn('Sex    : ',sexf);
  WriteLn('Status : ',statf);
  WriteLn('');
  WriteLn('');
  WriteLn('');
  
  LenName := Length(Name);
  LenPref := Length(pref);
  LenName := LenName + LenPref;
  LenSexF := Length(sexf);
  x := LenSexF;

  WriteLn(line);
  Write('Code');
  for i := 0 to 11 do
    Write(' ');
  Write('Name');
  for i := 0 to LenName do
    Write(' ');
  Write('Age');
  Write('    ');
  Write('Sex');
  for i := 0 to x do
    Write(' ');
  WriteLn('Status');
  WriteLn(line);
  Write(Code); Write(pref:9); Write(Name:5); Write(Age:7); Write(sexf:8); 
  for i := 0 to x do
    Write(' ');
  WriteLn(statf);
  WriteLn(line);
end.
