program gradecaseofv1;
uses
  crt;
var
  score : Integer;
begin
  ClrScr;
  // Check Input Scores
  repeat
    Write('Input Scores : ');
    ReadLn(score);
    if (score >= 0) and (score <= 100) then
    begin
      case (score) of
        80..100 : WriteLn('A');
        75..79 : WriteLn('B+');
        70..74 : WriteLn('B');
        65..69 : WriteLn('C+');
        60..64 : WriteLn('C');
        55..59 : WriteLn('D+');
        50..54 : WriteLn('D');
        0..49 : WriteLn('F');
        else // Unreachable Block
          WriteLn('Input Score out of Range.');
      end;
      Break
    end
    else
      WriteLn('Input Score out of Range.');
  until (False);
end.