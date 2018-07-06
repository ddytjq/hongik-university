import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.StringTokenizer;

public class Test {
	public static void main(String[] args) throws IOException{
		BufferedReader b = new BufferedReader(new FileReader("test_case\\test case4.txt")); // ���������
		String line;
		int x = 0, y = 0, j = 0; // ����
		int num = Integer.parseInt(b.readLine());
		int processnum[] = new int[num];
		int pid[][] = new int[num][4]; // a, c, b, io ��������� �迭
		int arrivetime[] = new int[num]; // �����ð� = a
		int cputime[]= new int[num]; // cpu�ѽð� = c
		int cburst[] = new int[num]; // cpuburst = b
		int ioburst[] = new int[num]; // ioburst = io
		int counter[] = new int[num]; // ������������ �ð�
		int turnaroundtime[] = new int[num]; // ������������ �ð� - �����ð�
		int waitingtime[] = new int[num]; // ready queue + io queue�� �ִ� �ð�
		double ft = 0, att=0, awt=0,cu = 0, iou=0, t = 0; // finishingtime, average turnaround time, average waiting time, cpu utilization, i/o utilization -> ����
		// ������ ���� null �� �ɶ����� �о
		while ( (line = b.readLine()) != null ){
			StringTokenizer tk = new StringTokenizer(line, " "); //��ū�������� �̿��� �ܾ �и���Ŵ -> ���� �и��ܾ�� " " ���� �����̽��� ��������
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
		
		//�� �ð��� ����
		for(int i = 0; i < num; i++){
			processnum[i] = i;
			arrivetime[i] = pid[i][0]; // �����ð� ����
			cputime[i] = pid[i][1]; // cpu �ѽð� ����
			cburst[i] = (int) Math.random()*pid[i][2]+1; // ����cpu burst ����
			ioburst[i] = (int) Math.random()+pid[i][3];// ���� io burst ����
			counter[i] = 0; //�� �ð� 0���� �ʱ�ȭ
			turnaroundtime[i] = 0; // �Ͼ����ð� 0���� �ʱ�ȭ
			waitingtime[i] = 0; // ������Ÿ�� 0���� �ʱ�ȭ
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		ReadyQueue rq = new ReadyQueue(num, cputime, processnum); //readyqueue����
		IO io = new IO(num, cburst, ioburst, rq, processnum); //io����
		CPU_running cr = new CPU_running(num, cburst, cputime, rq, io); //cpu running ����
		//first �ֱ�
		for(int i = 0; i < num; i++)
			rq.insert(cburst[i], i); //�ʱ�cpuburst readyqueue�� �ֱ�

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
		//Finishing time, turnaround time, waiting time ����
		for(int c = 0; c < num; c++){
			turnaroundtime[c] = ((cr.carray[c])+(io.ioadd[c])+(rq.counterrq[c]));
			waitingtime[c] = rq.counterrq[c];
		}

		//5���� �� ���
		for(int f = 0; f < num; f++){
			System.out.println("Processor["+(f+1)+"]");
			System.out.println("Finishing Time["+(f+1)+"]"+" : "+(turnaroundtime[f]+arrivetime[f]));
			System.out.println("Turnaround Time["+(f+1)+"]"+" : "+(turnaroundtime[f]));
			System.out.println("CPU time["+(f+1)+"]"+" : "+(cr.carray[f]));
			System.out.println("IO time["+(f+1)+"]"+" : "+(io.ioadd[f]));
			System.out.println("Waiting time["+(f+1)+"]"+" : "+(waitingtime[f]));
			System.out.println(" ");
		}

		//summary data (�� finishing time, cpu ȿ��(%), i/o ȿ��(%), ó����(%), ��� turnaround time, ��� waiting time)
		for(int i = 0; i < num; i++){
			ft += turnaroundtime[i]+waitingtime[i];
			att += turnaroundtime[i];
			cu += cr.carray[i];
			iou += io.ioadd[i];
			awt += waitingtime[i];
			t += 1;
		}
		cu = cu / ft * 100; // cpuȿ�� = ��� cpu time ���Ѱ� / finishing time * 100 (%)
		iou = iou / ft * 100; // I/Oȿ�� = ��� i/o time ���Ѱ� / finishing time * 100 (%)
		t = t / ft * 100; // ó����(�־�� �ð����� ��� �ð��� ������.) = ���μ��� ���� / finishing time * 100(%)

		//summary data ���
		System.out.println("Finishing time : "+ft);
		System.out.println("CPU utilization : " + cu +"%");
		System.out.println("I/O utilization : " + iou +"%");
		System.out.println("Throughput : "+ t +"%");
		System.out.println("Average turnaround time :"+(att/num));
		System.out.println("Average waiting time : "+(awt/num));
	}
}
