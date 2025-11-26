<?php
    include('conexxion.php');

    //Listdao de podructos

    function fn_listadoCol($cn){
        $sql="SELECT E.IDE_EMP, E.NOM_EMP, E.APE_EMP, C.DES_CAR,E.FON_EMP,
                    E.FCO_EMP, C.SAL_CAR, C.PAG_CAR
                FROM EMPLEADO E
                JOIN CARGO C ON C.IDE_CAR=E.IDE_CAR
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }
    function fn_listadoEmpleado($cn){
        $sql="SELECT E.IDE_EMP, E.NOM_EMP, E.APE_EMP, C.DES_CAR,E.FON_EMP, E.EMA_EMP, T.DES_TDO
                FROM EMPLEADO E
                JOIN CARGO C ON C.IDE_CAR=E.IDE_CAR
                JOIN TIPODOC T ON T.IDE_TDO=E.IDE_TDO
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoLogistica($cn){
        $sql="SELECT E.IDE_EMP, E.NOM_EMP, E.APE_EMP, C.DES_CAR,E.FON_EMP,
                    E.FCO_EMP
                FROM EMPLEADO E
                JOIN CARGO C ON C.IDE_CAR=E.IDE_CAR
                WHERE E.IDE_CAR = 2
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoVendedor($cn){
        $sql="SELECT E.IDE_EMP, E.NOM_EMP, E.APE_EMP, C.DES_CAR,E.FON_EMP,
                    E.FCO_EMP
                FROM EMPLEADO E
                JOIN CARGO C ON C.IDE_CAR=E.IDE_CAR
                WHERE E.IDE_CAR = 1
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoContabilidad($cn){
        $sql="SELECT E.IDE_EMP, E.NOM_EMP, E.APE_EMP, C.DES_CAR,E.FON_EMP,
                    E.FCO_EMP
                FROM EMPLEADO E
                JOIN CARGO C ON C.IDE_CAR=E.IDE_CAR
                WHERE E.IDE_CAR = 3
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoCourier($cn){
        $sql="SELECT E.IDE_EMP, E.NOM_EMP, E.APE_EMP, C.DES_CAR,E.FON_EMP,
                    E.FCO_EMP
                FROM EMPLEADO E
                JOIN CARGO C ON C.IDE_CAR=E.IDE_CAR
                WHERE E.IDE_CAR = 4
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }
/*LISTADO DE PRODUCTOS POR CATEGORIA */
/*1. LISTADO DE CATEGORIAS COMBOX*/
    function fn_listadocategorias($cn){
        $sql="SELECT C.IDE_CAT, C.NOM_CAT
	          FROM CATEGORIA C;";
        
        $consulta=mysqli_query($cn,$sql);
        return $consulta;
    }

    function fn_listadoestaciones($cn){
        $sql="SELECT E.IDE_EST, E.NOM_EST
	          FROM ESTACION E;";
        
        $consulta=mysqli_query($cn,$sql);
        return $consulta;
    }

    function fn_listadoCargo($cn){
        $sql="SELECT C.IDE_CAR, C.DES_CAR
	          FROM CARGO C;";
        
        $consulta=mysqli_query($cn,$sql);
        return $consulta;
    }

    function fn_listadoTDoc($cn){
        $sql="SELECT T.IDE_TDO, T.DES_TDO
	          FROM TIPODOC T;";
        
        $consulta=mysqli_query($cn,$sql);
        return $consulta;
    }
/*2. LISTADO DE PRODUCTOS X CATEGORIAS */
    function fn_listadoproductosxcat($cn, $cat){
        $sql="SELECT P.IDE_PRO, P.NOM_PRO, PR.NOM_PROV, C.NOM_CAT,P.UEX_PRO,
				    P.PRE_PRO, P.FOT_PRO
                FROM PRODUCTO P
                JOIN CATEGORIA C ON C.IDE_CAT=P.IDE_CAT
                JOIN PROVEEDOR PR ON PR.IDE_PROV=P.IDE_PROV
                WHERE C.IDE_CAT=$cat
                ORDER BY 1 ASC";
        
        $consulta=mysqli_query($cn,$sql);
        return $consulta;
    }

    function fn_listadoclientes($cn){
        $sql="SELECT C.IDE_CLI, C.NOM_CLI, C.NDO_CLI, T.DES_TDO, C.FON_CLI
                FROM CLIENTE C
                JOIN TIPODOC T ON T.IDE_TDO=C.IDE_TDO
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }
        function fn_listadoreservas($cn){
        $sql="SELECT R.IDE_RES, C.NOM_CLI, R.FEN_RES, R.FSA_RES, R.NNO_RES, H.NUM_HAB, R.MTO_RES
                FROM RESERVA R
                JOIN HABITACION H ON H.IDE_HAB=R.IDE_HAB
                JOIN CLIENTE C ON C.IDE_CLI=R.IDE_CLI
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoclientesxpai($cn,$pai){
        $sql="SELECT C.IDE_CLI, C.NOM_CLI, C.DIR_CLI, P.NOM_PAI, C.FON_CLI
                FROM CLIENTE C
                JOIN PAIS P ON P.IDE_PAI=C.IDE_PAI
                WHERE C.IDE_PAI=$pai
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoPais($cn){
        $sql="SELECT P.IDE_PAI,P.NOM_PAI
                FROM PAIS P;";
        
        $consulta=mysqli_query($cn,$sql);
        return $consulta;
    }
    function fn_listadoProveedor($cn){
        $sql="SELECT P.IDE_PROV, P.NOM_PROV
                FROM PROVEEDOR P
                ORDER BY 1 ASC;";
    
        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoRegistro($cn){
        $sql="SELECT R.IDE_REG, R.DES_REG, R.IDE_PRO, R.CAN_REG, R.PRE_REG 
                FROM REGISTRO R
                JOIN PRODUCTO P ON P.IDE_PRO=R.IDE_PRO
                ORDER BY 1 ASC;";
    
        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoCodigos($cn){
        $sql="SELECT IDE_PRO FROM PRODUCTO;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoproductosV($cn){
        $sql="SELECT P.IDE_PRO, P.NOM_PRO, C.NOM_CAT,P.UEX_PRO,
                    P.PRE_PRO, P.FOT_PRO
                FROM PRODUCTO P
                JOIN CATEGORIA C ON C.IDE_CAT=P.IDE_CAT
                WHERE P.IDE_EST = 1
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoproductosO($cn){
        $sql="SELECT P.IDE_PRO, P.NOM_PRO, C.NOM_CAT,P.UEX_PRO,
                    P.PRE_PRO, P.FOT_PRO
                FROM PRODUCTO P
                JOIN CATEGORIA C ON C.IDE_CAT=P.IDE_CAT
                WHERE P.IDE_EST = 2
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoproductosI($cn){
        $sql="SELECT P.IDE_PRO, P.NOM_PRO, C.NOM_CAT,P.UEX_PRO,
                    P.PRE_PRO, P.FOT_PRO
                FROM PRODUCTO P
                JOIN CATEGORIA C ON C.IDE_CAT=P.IDE_CAT
                WHERE P.IDE_EST = 3
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoproductosP($cn){
        $sql="SELECT P.IDE_PRO, P.NOM_PRO, C.NOM_CAT,P.UEX_PRO,
                    P.PRE_PRO, P.FOT_PRO
                FROM PRODUCTO P
                JOIN CATEGORIA C ON C.IDE_CAT=P.IDE_CAT
                WHERE P.IDE_EST = 4
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoproductos($cn){
        $sql="SELECT P.IDE_PRO, P.NOM_PRO, E.NOM_EST,C.NOM_CAT,P.UEX_PRO,
                    P.PRE_PRO, P.FOT_PRO
                FROM PRODUCTO P
                JOIN CATEGORIA C ON C.IDE_CAT=P.IDE_CAT
                JOIN ESTACION E ON E.IDE_EST = P.IDE_EST
                ORDER BY 1 ASC;";

        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }

    function fn_listadoEmpleados($cn){
        $sql="SELECT E.IDE_EMP, E.NOM_EMP, C.DES_CAR
                FROM EMPLEADO E
                JOIN CARGO C ON C.IDE_CAR=E.IDE_CAR
                ORDER BY 1 ASC;";
        $consulta=mysqli_query($cn, $sql);
        return $consulta;
    }