<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public $metres;
    public $feet;
    public $yards;
    public $centimetres;
    public $inches;
    public $width;
    public $length;
    public $depth;

    public function __construct(Request $request){
        $this->setMeasurementUnit($request['metres'],$request['feet'],$request['yards'],);
        $this->setDepthMeasurementUnit($request['centimetres'],$request['inches']);
        $this->setDimensions($request['width'],$request['length'],$request['depth']);
    }

    /**
     * Set Measurement Unit
     */
    public function setMeasurementUnit($metres,$feet,$yards){
        $this->metres = $metres;
        $this->feet = $feet;
        $this->yards = $yards;
    }
    /**
     * Set Depth Measurement Unit
     */
    public function setDepthMeasurementUnit($centimetres,$inches){
        $this->centimetres = $centimetres;
        $this->inches = $inches;
    }

    /**
     * Set Dimensions
     */
    public function setDimensions($width,$length,$depth){
        $this->width = $width;
        $this->length = $length;
        $this->depth = $depth;
    }

    /**
     * Calculate Quantity of bags
     * @return float
     */
    public function calculateQuantity(){
        $x = $this->metres * 0.025;
        $y = $x* 1.4;
        $total_bags = round($y);
        return $total_bags;
    }

    /**
     * Calculate Cost of Bags
     * @return float|int
     */
    public function calculateCost(){
        $quantity = $this->calculateQuantity();
        $cost = $quantity * 72;
        return $cost;
    }

}
