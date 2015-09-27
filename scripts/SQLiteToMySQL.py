#! /usr/bin/env python
# ----------------------------------
#  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
#   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
#    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
#     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
#      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
#       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
#        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
#         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
#          _\///______________\///___\////__________\///////////_____\/////////////_____
#			By toulousain79 ---> https://github.com/toulousain79/
#
######################################################################
#
#	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
#	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
#	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
#	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
#	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
#	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
#
######################################################################
#
# http://www.redmine.org/attachments/download/6239/sqlite3-to-mysql.py
#
##################### FIRST LINE #####################################

import sys

def main():
    print "SET sql_mode='NO_BACKSLASH_ESCAPES';"
    lines = sys.stdin.read().splitlines()
    for line in lines:
        processLine(line)

def processLine(line):
    if (
        line.startswith("PRAGMA") or 
        line.startswith("BEGIN TRANSACTION;") or
        line.startswith("COMMIT;") or
        line.startswith("DELETE FROM sqlite_sequence;") or
        line.startswith("INSERT INTO \"sqlite_sequence\"")
       ):
        return
    line = line.replace("AUTOINCREMENT", "AUTO_INCREMENT")
    line = line.replace("DEFAULT 't'", "DEFAULT '1'")
    line = line.replace("DEFAULT 'f'", "DEFAULT '0'")
    line = line.replace(",'t'", ",'1'")
    line = line.replace(",'f'", ",'0'")
    in_string = False
    newLine = ''
    for c in line:
        if not in_string:
            if c == "'":
                in_string = True
            elif c == '[':
                newLine = newLine + '`'
                continue
            elif c == ']':
                newLine = newLine + '`'
                continue
            elif c == '"':
                newLine = newLine + '`'
                continue
        elif c == "'":
            in_string = False
        newLine = newLine + c
    print newLine

if __name__ == "__main__":
    main()

# -----------------------------------------
##################### LAST LINE ######################################