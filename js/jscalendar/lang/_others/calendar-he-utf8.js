// ** I18N

// Calendar EN language
// Author: Idan Sofer, <idan@idanso.dyndns.org>
// Encoding: UTF-8
// Distributed under the same terms as the calendar itself.

// For translators: please use UTF-8 if possible.  We strongly believe that
// Unicode is the answer to a real internationalized world.  Also please
// include your contact information in the header, as can be seen above.

// full day names
Calendar._DN = new Array
("×¨×�×©×•×Ÿ",
 "×©× ×™",
 "×©×œ×™×©×™",
 "×¨×‘×™×¢×™",
 "×—×ž×™×©×™",
 "×©×™×©×™",
 "×©×‘×ª",
 "×¨×�×©×•×Ÿ");

// Please note that the following array of short day names (and the same goes
// for short month names, _SMN) isn't absolutely necessary.  We give it here
// for exemplification on how one can customize the short day names, but if
// they are simply the first N letters of the full name you can simply say:
//
//   Calendar._SDN_len = N; // short day name length
//   Calendar._SMN_len = N; // short month name length
//
// If N = 3 then this is not needed either since we assume a value of 3 if not
// present, to be compatible with translation files that were written before
// this feature.

// short day names
Calendar._SDN = new Array
("×�",
 "×‘",
 "×’",
 "×“",
 "×”",
 "×•",
 "×©",
 "×�");

// full month names
Calendar._MN = new Array
("×™× ×•×�×¨",
 "×¤×‘×¨×•×�×¨",
 "×ž×¨×¥",
 "×�×¤×¨×™×œ",
 "×ž×�×™",
 "×™×•× ×™",
 "×™×•×œ×™",
 "×�×•×’×•×¡×˜",
 "×¡×¤×˜×ž×‘×¨",
 "×�×•×§×˜×•×‘×¨",
 "× ×•×‘×ž×‘×¨",
 "×“×¦×ž×‘×¨");

// short month names
Calendar._SMN = new Array
("×™× ×�",
 "×¤×‘×¨",
 "×ž×¨×¥",
 "×�×¤×¨",
 "×ž×�×™",
 "×™×•× ",
 "×™×•×œ",
 "×�×•×’",
 "×¡×¤×˜",
 "×�×•×§",
 "× ×•×‘",
 "×“×¦×ž");

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "×�×•×“×•×ª ×”×©× ×ª×•×Ÿ";

Calendar._TT["ABOUT"] =
"×‘×—×¨×Ÿ ×ª×�×¨×™×š/×©×¢×” DHTML\n" +
"(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" + // don't translate this this ;-)
"×”×’×™×¨×¡×� ×”×�×—×¨×•× ×” ×–×ž×™× ×” ×‘: http://www.dynarch.com/projects/calendar/\n" +
"×ž×•×¤×¥ ×ª×—×ª ×–×™×›×™×•×Ÿ ×” GNU LGPL.  ×¢×™×™×Ÿ ×‘ http://gnu.org/licenses/lgpl.html ×œ×¤×¨×˜×™×� × ×•×¡×¤×™×�." +
"\n\n" +
"×‘×—×™×¨×ª ×ª×�×¨×™×š:\n" +
"- ×”×©×ª×ž×© ×‘×›×¤×ª×•×¨×™×� \xab, \xbb ×œ×‘×—×™×¨×ª ×©× ×”\n" +
"- ×”×©×ª×ž×© ×‘×›×¤×ª×•×¨×™×� " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " ×œ×‘×—×™×¨×ª ×—×•×“×©\n" +
"- ×”×—×–×§ ×”×¢×›×‘×¨ ×œ×—×•×¥ ×ž×¢×œ ×”×›×¤×ª×•×¨×™×� ×”×ž×•×–×›×¨×™×� ×œ×¢×™×œ ×œ×‘×—×™×¨×” ×ž×”×™×¨×” ×™×•×ª×¨.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"×‘×—×™×¨×ª ×–×ž×Ÿ:\n" +
"- ×œ×—×¥ ×¢×œ ×›×œ ×�×—×“ ×ž×—×œ×§×™ ×”×–×ž×Ÿ ×›×“×™ ×œ×”×•×¡×™×£\n" +
"- ×�×• shift ×‘×©×™×œ×•×‘ ×¢×� ×œ×—×™×¦×” ×›×“×™ ×œ×”×—×¡×™×¨\n" +
"- ×�×• ×œ×—×¥ ×•×’×¨×•×¨ ×œ×¤×¢×•×œ×” ×ž×”×™×¨×” ×™×•×ª×¨.";

Calendar._TT["PREV_YEAR"] = "×©× ×” ×§×•×“×ž×ª - ×”×—×–×§ ×œ×§×‘×œ×ª ×ª×¤×¨×™×˜";
Calendar._TT["PREV_MONTH"] = "×—×•×“×© ×§×•×“×� - ×”×—×–×§ ×œ×§×‘×œ×ª ×ª×¤×¨×™×˜";
Calendar._TT["GO_TODAY"] = "×¢×‘×•×¨ ×œ×”×™×•×�";
Calendar._TT["NEXT_MONTH"] = "×—×•×“×© ×”×‘×� - ×”×—×–×§ ×œ×ª×¤×¨×™×˜";
Calendar._TT["NEXT_YEAR"] = "×©× ×” ×”×‘×�×” - ×”×—×–×§ ×œ×ª×¤×¨×™×˜";
Calendar._TT["SEL_DATE"] = "×‘×—×¨ ×ª×�×¨×™×š";
Calendar._TT["DRAG_TO_MOVE"] = "×’×¨×•×¨ ×œ×”×–×–×”";
Calendar._TT["PART_TODAY"] = " )×”×™×•×�(";

// the following is to inform that "%s" is to be the first day of week
// %s will be replaced with the day name.
Calendar._TT["DAY_FIRST"] = "×”×¦×’ %s ×§×•×“×�";

// This may be locale-dependent.  It specifies the week-end days, as an array
// of comma-separated numbers.  The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "6";

Calendar._TT["CLOSE"] = "×¡×’×•×¨";
Calendar._TT["TODAY"] = "×”×™×•×�";
Calendar._TT["TIME_PART"] = "(×©×™×¤×˜-)×œ×—×¥ ×•×’×¨×•×¨ ×›×“×™ ×œ×©× ×•×ª ×¢×¨×š";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%m-%d";
Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e";

Calendar._TT["WK"] = "wk";
Calendar._TT["TIME"] = "×©×¢×”::";
