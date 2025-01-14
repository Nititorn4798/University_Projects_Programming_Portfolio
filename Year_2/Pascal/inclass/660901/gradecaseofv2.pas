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
    case (score) of
      80..100 : 
        begin
          WriteLn('A');
          Break
        end;
      75..79 :
        begin
          WriteLn('B+');
          Break
        end;
      70..74 :
        begin
          WriteLn('B');
          Break
        end;
      65..69 :
        begin
          WriteLn('C+');
          Break
        end;
      60..64 :
        begin
          WriteLn('C');
          Break
        end;
      55..59 :
        begin
          WriteLn('D+');
          Break
        end;
      50..54 :
        begin
          WriteLn('D');
          Break
        end;
      0..49 :
        begin
          WriteLn('F');
          Break
        end;
      else
        WriteLn('Input Score out of Range.');
    end;
  until (True);
end.