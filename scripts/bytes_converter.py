#!/usr/bin/env python
# -*- coding: utf8 -*-
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
# #####################################################################
#
#	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
#	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
#	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
#	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
#	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
#	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
#
# #################### FIRST LINE #####################################

"""
Bytes-to-human / human-to-bytes converter.
Original project: http://code.activestate.com/recipes/578019-bytes-to-human-human-to-bytes-converter/
Original author: Author: Giampaolo Rodola' <g.rodola [AT] gmail [DOT] com>
License: MIT

Working with Python 2.x and 3.x.
"""

import doctest
import argparse
import os

# ------------------------------------------------------------
# Variables - Begin
# ------------------------------------------------------------

# Version
VERSION = '0.1'
# Symbols
SYMBOLS = {
    'customary'     : ('B', 'K', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y'),
    'customary_ext' : ('byte', 'kilo', 'mega', 'giga', 'tera', 'peta', 'exa',
                       'zetta', 'iotta'),
    'iec'           : ('Bi', 'Ki', 'Mi', 'Gi', 'Ti', 'Pi', 'Ei', 'Zi', 'Yi'),
    'iec_ext'       : ('byte', 'kibi', 'mebi', 'gibi', 'tebi', 'pebi', 'exbi',
                       'zebi', 'yobi'),
}

# ------------------------------------------------------------
# Variables - End
# ------------------------------------------------------------


# ------------------------------------------------------------
# Functions - Begin
# ------------------------------------------------------------

# ############################################################
def main():
    """
    Main
    """

    parser = argparse.ArgumentParser(
        description="Bytes-to-human / Human-to-bytes converter.")

    parser.add_argument(
        '--version',
        action='version',
        version='%(prog)s v{}'.format(VERSION))
    parser.add_argument(
        '--mode',
        help='Convert mode: '
            '"bth" for Bytes To Human '
            'OR '
            '"htb" for Human To Bytes',
        choices=['bth', 'htb'],
        required=False,
        default='htb')
    parser.add_argument('-bth', dest='command', action='store_const',
        const='help_bth', help='Show help for "bth" mode.')
    parser.add_argument('-htb', dest='command', action='store_const',
        const='help_htb', help='Show help for "htb" mode.')
    parser.add_argument(
        '--value',
        help='Value to convert.'
        '',
        required=False)

    args = parser.parse_args()

    if args.command == 'help_bth':
            help(bytes2human)
    elif args.command == 'help_htb':
            help(human2bytes)
    else:
            os.system("python3 {}/{} -h".
                format(os.path.dirname(os.path.realpath(__file__)), __file__))


# ############################################################
def bytes2human(n, format='%(value).1f %(symbol)s', symbols='customary'):
    """
    Convert n bytes into a human readable string based on format.
    symbols can be either "customary", "customary_ext", "iec" or "iec_ext",
    see: http://goo.gl/kTQMs

      >>> bytes2human(0)
      '0.0 B'
      >>> bytes2human(0.9)
      '0.0 B'
      >>> bytes2human(1)
      '1.0 B'
      >>> bytes2human(1.9)
      '1.0 B'
      >>> bytes2human(1024)
      '1.0 K'
      >>> bytes2human(1048576)
      '1.0 M'
      >>> bytes2human(1099511627776127398123789121)
      '909.5 Y'

      >>> bytes2human(9856, symbols="customary")
      '9.6 K'
      >>> bytes2human(9856, symbols="customary_ext")
      '9.6 kilo'
      >>> bytes2human(9856, symbols="iec")
      '9.6 Ki'
      >>> bytes2human(9856, symbols="iec_ext")
      '9.6 kibi'

      >>> bytes2human(10000, "%(value).1f %(symbol)s/sec")
      '9.8 K/sec'

      >>> # precision can be adjusted by playing with %f operator
      >>> bytes2human(10000, format="%(value).5f %(symbol)s")
      '9.76562 K'
    """
    n = int(n)
    if n < 0:
        raise ValueError("n < 0")
    symbols = SYMBOLS[symbols]
    prefix = {}
    for i, s in enumerate(symbols[1:]):
        prefix[s] = 1 << (i+1)*10
    for symbol in reversed(symbols[1:]):
        if n >= prefix[symbol]:
            value = float(n) / prefix[symbol]
            return format % locals()
    return format % dict(symbol=symbols[0], value=n)

# ############################################################
def human2bytes(s):
    """
    Attempts to guess the string format based on default symbols
    set and return the corresponding bytes as an integer.
    When unable to recognize the format ValueError is raised.

      >>> human2bytes('0 B')
      0
      >>> human2bytes('1 K')
      1024
      >>> human2bytes('1 M')
      1048576
      >>> human2bytes('1 Gi')
      1073741824
      >>> human2bytes('1 tera')
      1099511627776

      >>> human2bytes('0.5kilo')
      512
      >>> human2bytes('0.1  byte')
      0
      >>> human2bytes('1 k')  # k is an alias for K
      1024
      >>> human2bytes('12 foo')
      Traceback (most recent call last):
          ...
      ValueError: can't interpret '12 foo'
    """
    init = s
    num = ""
    while s and s[0:1].isdigit() or s[0:1] == '.':
        num += s[0]
        s = s[1:]
    num = float(num)
    letter = s.strip()
    for name, sset in SYMBOLS.items():
        if letter in sset:
            break
    else:
        if letter == 'k':
            # treat 'k' as an alias for 'K' as per: http://goo.gl/kTQMs
            sset = SYMBOLS['customary']
            letter = letter.upper()
        else:
            raise ValueError("can't interpret %r" % init)
    prefix = {sset[0]:1}
    for i, s in enumerate(sset[1:]):
        prefix[s] = 1 << (i+1)*10
    return int(num * prefix[letter])

# ------------------------------------------------------------
# Functions - End
# ------------------------------------------------------------

# #####################################################################
#
# B E G I N   -   C O M M A N D  L I N E  M O D E
#
# #####################################################################

if __name__ == "__main__":
    doctest.testmod()
    main()

# #####################################################################
#
# E N D   -   C O M M A N D  L I N E  M O D E
#
# #####################################################################