<?php

namespace MVCTestApp;

abstract class BaseView
{
    abstract public function loadContent($tmpl);

    abstract public function getOutput();
}