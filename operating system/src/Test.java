import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.StringTokenizer;

public class Test {
	public static void main(String[] args) throws IOException{
		BufferedReader b = new BufferedReader(new FileReader("test_case\\test case4.txt")); // 파일입출력
		String line;
		int x = 0, y = 0, j = 0; // 변수
		int num = Integer.parseInt(b.readLine());
		int processnum[] = new int[num];
		int pid[][] = new int[num][4]; // a, c, b, io 순서대로의 배열
		int arrivetime[] = new int[num]; // 도착시간 = a
		int cputime[]= new int[num]; // cpu총시간 = c
		int cburst[] = new int[num]; // cpuburst = b
		int ioburst[] = new int[num]; // ioburst = io
		int counter[] = new int[num]; // 끝날때까지의 시간
		int turnaroundtime[] = new int[num]; // 끝날때까지의 시간 - 도착시간
		int waitingtime[] = new int[num]; // ready queue + io queue에 있던 시간
		double ft = 0, att=0, awt=0,cu = 0, iou=0, t = 0; // finishingtime, average turnaround time, average waiting time, cpu utilization, i/o utilization -> 비율
		// 라인의 값이 null 이 될때까지 읽어냄
		while ( (line = b.readLine()) != null ){
			StringTokenizer tk = new StringTokenizer(line, " "); //토큰라이저를 이용해 단어를 분리시킴 -> 현재 분리단어는 " " 공백 스페이스로 나누어짐
			String token;
			while ( tk.hasMoreTokens() ) { 
				token = tk.nextToken();
				pid[x][y] = Integer.parseInt(token);
				y++;
			}
			y = 0;
			x++;
			if(x == num)
				break;
		}
		
		//각 시간별 저장
		for(int i = 0; i < num; i++){
			processnum[i] = i;
			arrivetime[i] = pid[i][0]; // 도착시간 저장
			cputime[i] = pid[i][1]; // cpu 총시간 저장
			cburst[i] = (int) Math.random()*pid[i][2]+1; // 랜덤cpu burst 저장
			ioburst[i] = (int) Math.random()+pid[i][3];// 랜덤 io burst 저장
			counter[i] = 0; //총 시간 0으로 초기화
			turnaroundtime[i] = 0; // 턴어라운드시간 0으로 초기화
			waitingtime[i] = 0; // 웨이팅타임 0으로 초기화
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		ReadyQueue rq = new ReadyQueue(num, cputime, processnum); //readyqueue생성
		IO io = new IO(num, cburst, ioburst, rq, processnum); //io생성
		CPU_running cr = new CPU_running(num, cburst, cputime, rq, io); //cpu running 생성
		//first 넣기
		for(int i = 0; i < num; i++)
			rq.insert(cburst[i], i); //초기cpuburst readyqueue에 넣기

		io.IOinsert(0);
		rq.remove();
		rq.counterrq();
//******************************************************************************************
		while(true){
			cr.cpuing((int)rq.index());
			counter[(int)rq.index()] += 1;
			int max = 0;
			for(int f = 0; f < num; f++){
				max+= cr.allcputime[f];
			}
			if(max == 0)
				break;
			io.IOing((int)rq.index());
			counter[(int)rq.index()] += 1;
		}
//******************************************************************************************
		//Finishing time, turnaround time, waiting time 저장
		for(int c = 0; c < num; c++){
			turnaroundtime[c] = ((cr.carray[c])+(io.ioadd[c])+(rq.counterrq[c]));
			waitingtime[c] = rq.counterrq[c];
		}

		//5가지 값 출력
		for(int f = 0; f < num; f++){
			System.out.println("Processor["+(f+1)+"]");
			System.out.println("Finishing Time["+(f+1)+"]"+" : "+(turnaroundtime[f]+arrivetime[f]));
			System.out.println("Turnaround Time["+(f+1)+"]"+" : "+(turnaroundtime[f]));
			System.out.println("CPU time["+(f+1)+"]"+" : "+(cr.carray[f]));
			System.out.println("IO time["+(f+1)+"]"+" : "+(io.ioadd[f]));
			System.out.println("Waiting time["+(f+1)+"]"+" : "+(waitingtime[f]));
			System.out.println(" ");
		}

		//summary data (총 finishing time, cpu 효율(%), i/o 효율(%), 처리량(%), 평균 turnaround time, 평균 waiting time)
		for(int i = 0; i < num; i++){
			ft += turnaroundtime[i]+waitingtime[i];
			att += turnaroundtime[i];
			cu += cr.carray[i];
			iou += io.ioadd[i];
			awt += waitingtime[i];
			t += 1;
		}
		cu = cu / ft * 100; // cpu효율 = 모든 cpu time 더한것 / finishing time * 100 (%)
		iou = iou / ft * 100; // I/O효율 = 모든 i/o time 더한것 / finishing time * 100 (%)
		t = t / ft * 100; // 처리량(주어신 시간동안 몇개의 시간이 끝났다.) = 프로세스 개수 / finishing time * 100(%)

		//summary data 출력
		System.out.println("Finishing time : "+ft);
		System.out.println("CPU utilization : " + cu +"%");
		System.out.println("I/O utilization : " + iou +"%");
		System.out.println("Throughput : "+ t +"%");
		System.out.println("Average turnaround time :"+(att/num));
		System.out.println("Average waiting time : "+(awt/num));
	}
}
